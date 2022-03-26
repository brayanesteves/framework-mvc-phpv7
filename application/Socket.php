<?php  

  class Sock {

    public $sockets; // grupo de conexiones de socket, es decir, el indicador de socket al que se conectó el cliente
    public $users;   // Toda la información de conexión del cliente, incluido el socket, el nombre del cliente, etc.
    public $master;  // recurso de socket, es decir, el recurso de socket devuelto cuando el socket se inicializó en la etapa inicial   

    private $sda  = array();   // Datos recibidos
    private $slen = array();  // Longitud total de datos
    private $sjen = array();  // Longitud de los datos recibidos
    private $ar   = array();    // clave de cifrado
    private $n    = array();    

    public function __construct($address, $port) {
        // Cree un socket y guarde el recurso del socket en $ this-> master
        $this->master  = $this->WebSocket($address, $port);
        // Crear un grupo de conexiones de socket
        $this->sockets = array($this->master);
    }

    

    // Escucha el loop de socket creado y procesa los datos
    function run() {
        // Bucle sin fin hasta que se desconecte el zócalo
        while(true) {

            $changes = $this->sockets;
            $write   = NULL;
            $except  = NULL;
            /*

              // Esta función es la clave para aceptar múltiples conexiones al mismo tiempo, entiendo que es para impedir que el programa continúe ejecutándose.
              socket_select ($sockets, $write = NULL, $except = NULL, NULL);
              $sockets se pueden entender como una matriz, que almacena descriptores de archivos. Cuando cambia (es decir, llega un nuevo mensaje o hay una conexión / desconexión del cliente), la función socket_select regresará y continuará ejecutándose.
              $write es para monitorear si el cliente escribe datos, y pasar NULL no le importa si hay un cambio en la escritura.
              $except es el elemento que debe excluirse en $ sockets. Pasar NULL es "escuchar" todo.
              El último parámetro es el tiempo de espera
              Si 0: finaliza inmediatamente
              Si es n > 1: finalizará como máximo n segundos después, si hay una nueva conexión, volverá por adelantado
              Si es nulo: si una nueva conexión tiene una nueva dinámica, devuelve
            */

            socket_select($changes, $write, $except, NULL);
            foreach($changes as $sock) {                

                // Si entra un nuevo cliente, entonces
                if($sock == $this->master) {
                    // Aceptar una conexión de socket
                    $client = socket_accept($this->master);

                    // Una identificación única para el socket recién conectado
                    $key = uniqid();
                    $this->sockets[]   = $client;  // Guarde el zócalo recién conectado en el grupo de conexiones
                    $this->users[$key] = array(
                        'socket' => $client,  // Registre la información del socket del cliente recién conectado.
                        'shou'   => false       // Significa que el recurso de socket no ha completado el apretón de manos
                    );
                // más 1. desconecte la conexión del socket para el cliente, 2. el cliente envía el mensaje
                } else { 
                    $len    = 0;
                    $buffer = '';
                    // Lea la información del socket. Nota: el segundo parámetro es el parámetro de referencia que son los datos recibidos, y el tercer parámetro es la longitud de los datos recibidos
                    do {
                      $l=socket_recv($sock,$buf,1000,0);
                      $len    += $l;
                      $buffer .= $buf;
                    } while($l == 1000);

                    // Encuentra los $ k correspondientes en el grupo de usuarios de acuerdo con el socket, es decir, el ID de estado
                    $k=$this->search($sock);

                    // Si la longitud del mensaje recibido es inferior a 7, el socket del cliente se desconecta
                    if($len < 7) {
                        // Desconecte el socket del cliente y elimínelo en $ this-> sockets y $ this-> users
                        $this->send2($k);
                        continue;

                    }

                    // determina si el socket ha sido sacudido
                    if(!$this->users[$k]['shou']) {
                        // Si no hay protocolo de enlace, realice el procesamiento del protocolo de enlace
                        $this->woshou($k, $buffer);
                    } else {
                        // Aquí es que el cliente envía información y descodifica la información recibida
                        $buffer = $this->uncode($buffer, $k);
                        if($buffer == false){
                          continue;
                        }
                        // Si no está vacío, presione el mensaje
                        $this->send($k, $buffer);
                    }
                }
            }
        }

    }

    // Especifique para cerrar el socket correspondiente a $ k
    function close($k) {
        // Desconecta el zócalo correspondiente
        socket_close($this->users[$k]['socket']);
        // Eliminar la información del usuario correspondiente
        unset($this->users[$k]);
        // Redefinir el conjunto de conexiones de sockets
        $this->sockets = array($this->master);
        foreach($this->users as $v){
            $this->sockets[] = $v['socket'];
        }

        // registro de salida
        $this->e("key:$k close");
    }

    // Encuentra los $ k correspondientes en usuarios según los calcetines

    function search($sock) {

        foreach ($this->users as $k => $v){
          if($sock == $v['socket'])
          return $k;
        }
        return false;
    }

    // Pase la IP y el puerto correspondientes para crear una operación de socket

    function WebSocket($address, $port) {

        $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1);// 1 significa aceptar todos los paquetes
        socket_bind($server, $address, $port);
        socket_listen($server);
        $this->e('Server Started : '. date('Y-m-d H:i:s'));
        $this->e('Listening on   : '. $address . ' port ' . $port);

        return $server;
    }    

    /*
      * Descripción de la función: responder a la solicitud del cliente, es decir, la operación de apretón de manos
      * El socket de @ $ k clien corresponde a la clave, es decir, cada usuario tiene un $ k único y corresponde al socket
      * @ $ buffer recibe toda la información solicitada por el cliente
    */

    function woshou($k, $buffer) {

        // Intercepta el valor de Sec-WebSocket-Key y encripta, la parte después de $ key 258EAFA5-E914-47DA-95CA-C5AB0DC85B11 string debe ser reparada
        $buf     = substr($buffer, strpos($buffer,'Sec-WebSocket-Key:') + 18);
        $key     = trim(substr($buf, 0, strpos($buf,"\r\n")));
        $new_key = base64_encode(sha1($key. "258EAFA5-E914-47DA-95CA-C5AB0DC85B11", true));        

        // Regresar de acuerdo con la información de combinación de protocolo
        $new_message  = "HTTP/1.1 101 Switching Protocols\r\n";
        $new_message .= "Upgrade: websocket\r\n";
        $new_message .= "Sec-WebSocket-Version: 13\r\n";
        $new_message .= "Connection: Upgrade\r\n";
        $new_message .= "Sec-WebSocket-Accept: " . $new_key . "\r\n\r\n";
        socket_write($this->users[$k]['socket'], $new_message, strlen($new_message));

        // Marca el cliente que se ha sacudido
        $this->users[$k]['shou'] = true;

        return true;
    }    

    // Función de decodificación
    function uncode($str, $key) {

        $mask = array(); 
        $data = ''; 
        $msg  = unpack('H*', $str);
        $head = substr($msg[1], 0, 2); 

        if ($head == '81' && !isset($this->slen[$key])) { 

            $len=substr($msg[1], 2, 2);
            $len=hexdec($len);// Convertir hexadecimal a decimal

            if(substr($msg[1], 2, 2) == 'fe') {

                $len=substr($msg[1], 4, 4);
                $len=hexdec($len);
                $msg[1] = substr($msg[1], 4);

            } else if(substr($msg[1], 2, 2) == 'ff') {
                $len    = substr($msg[1], 4, 16);
                $len    = hexdec($len);
                $msg[1] = substr($msg[1], 16);

            }
            $mask[] = hexdec(substr($msg[1],  4, 2)); 
            $mask[] = hexdec(substr($msg[1],  6, 2)); 
            $mask[] = hexdec(substr($msg[1],  8, 2)); 
            $mask[] = hexdec(substr($msg[1], 10, 2));
            $s      = 12;
            $n      = 0;

        }else if($this->slen[$key] > 0) {

            $len  = $this->slen[$key];
            $mask = $this->ar[$key];
            $n    = $this->n[$key];
            $s    = 0;
        }

        

        $e = strlen($msg[1]) - 2;
        for ($i = $s; $i <= $e; $i += 2) { 
            $data .= chr($mask[$n%4]^hexdec(substr($msg[1], $i, 2))); 
            $n++; 
        } 

        $dlen=strlen($data);        

        if($len > 255 && $len > $dlen + intval($this->sjen[$key])) {

            $this->ar[$key]   = $mask;
            $this->slen[$key] = $len;
            $this->sjen[$key] = $dlen + intval($this->sjen[$key]);
            $this->sda[$key]  = $this->sda[$key] . $data;
            $this->n[$key]    = $n;

            return false;

        } else {
            unset($this->ar[$key], $this->slen[$key], $this->sjen[$key], $this->n[$key]);
            $data=$this->sda[$key] . $data;
            unset($this->sda[$key]);

            return $data;

        }
    }

    // en lugar de descodificar
    function code($msg) {

        $frame    = array(); 
        $frame[0] = '81'; 
        $len = strlen($msg);
        if($len < 126){
            $frame[1] = $len<16?'0'. dechex($len):dechex($len);
        }else if($len < 65025){
            $s        = dechex($len);
            $frame[1] = '7e'. str_repeat('0', 4-strlen($s)) . $s;
        }else{
            $s        = dechex($len);
            $frame[1] = '7f'. str_repeat('0', 16 - strlen($s)) . $s;
        }
        $frame[2] = $this->ord_hex($msg);
        $data     = implode('', $frame); 

        return pack("H*", $data); 
    }

    
    function ord_hex($data)  { 
        $msg = ''; 
        $l   = strlen($data); 
        for ($i = 0; $i < $l; $i++) { 
            $msg .= dechex(ord($data[$i])); 
        } 
        return $msg; 
    }

    

    // El usuario se une o el cliente envía información

    function send($k,$msg){

        // Analiza la cadena de consulta en la segunda variable de parámetro y guárdala como una matriz, como: parse_str ("name = Bill & age = 60", $ arr)
        parse_str($msg,$g);
        $ar = array();

        if($g['type'] == 'add'){
            // Ingrese el nombre del chat por primera vez y guárdelo en los usuarios correspondientes
            $this->users[$k]['name'] = $g['ming'];
            $ar['type']              = 'add';
            $ar['name']              = $g['ming'];
            $key                     = 'all';

        }else{
            // Comportamiento de la información de envío, donde $g ['clave'] significa enfrentar a todos o individuos, es la información transmitida en el párrafo anterior
            $ar['nrong'] = $g['nr'];
            $key         = $g['key'];
        }
        // Información de inserción
        $this->send1($k, $ar, $key);
    }

    

    // Enviar el cliente en línea al cliente recién agregado
    function getusers(){
        $ar = array();
        foreach($this->users as $k => $v){
            $ar[] = array('code' => $k,'name' => $v['name']);
        }
        return $ar;
    }

    

    // $k El socketID del remitente $key El socketID del destinatario
    function send1($k, $ar, $key = 'all'){

        $ar['code1'] = $key;
        $ar['code']  = $k;
        $ar['time']  = date('m-d H:i:s');

        // Codificar la información enviada

        $str = $this->code(json_encode($ar));

        // Enviar un mensaje a todos, es decir, todos en línea

        if($key=='all'){
            $users = $this->users;
            // Si es agregar, significa el cliente recién agregado
            if($ar['type'] == 'add'){
                $ar['type']  = 'madd';
                $ar['users'] = $this->getusers();        // Eliminar todos los usuarios en línea para mostrar en la lista de usuarios en línea
                $str1        = $this->code(json_encode($ar)); // Codifica el nuevo cliente por separado, los datos son diferentes
                // Enviarlo por separado para el nuevo cliente, porque algunos datos son diferentes
                socket_write($users[$k]['socket'], $str1, strlen($str1));
                // Lo anterior se ha enviado solo al cliente, no hay necesidad de volver a enviarlo más tarde, así que desarma
                unset($users[$k]);
            }

            // Además del nuevo cliente, envíe información a otros clientes. Cuando la cantidad de datos es grande, debe tener en cuenta los retrasos y otros problemas.

            foreach($users as $v){
                socket_write($v['socket'], $str, strlen($str));
            }

        }else{
            // Enviar mensajes a individuos individualmente, es decir, ambos lados chatean
            socket_write($this->users[$k]['socket'],   $str, strlen($str));
            socket_write($this->users[$key]['socket'], $str, strlen($str));
        }

    }    

    // El usuario sale para enviar información al cliente utilizado
    function send2($k){
        $this->close($k);
        $ar['type']  = 'rmove';
        $ar['nrong'] = $k;
        $this->send1(false, $ar, 'all');
    }    

    // Grabar el registro
    function e($str){
        //$path=dirname(__FILE__).'/log.txt';
        $str = $str . "\n";
        //error_log($str,3,$path);
        // Procesamiento de codificación
        echo iconv('utf-8', 'gbk//IGNORE', $str);
    }
  }
?>