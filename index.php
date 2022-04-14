<?php
    ini_set('display_errors', 1);
    /**
     * It's slash '/'
     */
    define(      'DS', DIRECTORY_SEPARATOR);
    define(    'ROOT', realpath(dirname(__FILE__)) . DS);
    define('APP_PATH', ROOT . 'application'        . DS);
    
    /**
     * Test
     * echo ROOT;
     */
    try {
        require_once APP_PATH .     'Config.php';
        require_once APP_PATH .    'Request.php';
        require_once APP_PATH .  'Bootstrap.php';
        require_once APP_PATH . 'Controller.php';
        require_once APP_PATH .      'Model.php';
        require_once APP_PATH .       'View.php';
        require_once APP_PATH .     'Record.php';
        require_once APP_PATH .   'Database.php';
        require_once APP_PATH .    'Session.php';
        require_once APP_PATH .       'Hash.php';
        require_once APP_PATH .     'Socket.php';

        // =============================== //
        //         Test 'Hash.php'         //
        // =============================== //

        /**
         * echo Hash::getHash('sha1', '1234', HASH_KEY); exit;
         */        

        // =============================== //
        //          'Session.php'          //
        // =============================== //

        Session::init();

        // =============================== //
        //          Test 'Files'           //
        // =============================== //

        /**
         * echo '<pre>';
         * print_r(get_required_files());
         * echo '</pre>';
         */
        
        // =============================== //
        //        Test 'Request.php'       //
        // =============================== //
        /**
         * Test 'Request.php' directory[Folder] 'application': 
         * $r = new Request();
         * echo $r->getController() . '<br />';
         * echo $r->getMethod() . '<pre>';
         * print_r($r->getArgs());
         * echo '</pre>';
         * 
         * Test Nº0:
         * http://localhost/mvc-phpv7/controlller////method/arguments
         * 
         * Result:
         * 
         * controlller
         * method
         * 
         * Array
         * (
         *     [0] => arguments
         * )
         * 
         * Test Nº1
         * http://localhost/mvc-phpv7/controlller////method/arguments/test0/test1/test2
         * 
         * Result:
         * 
         * controlller
         * method
         * 
         * Array
         * (
         *     [0] => arguments
         *     [1] => test0
         *     [2] => test1
         *     [3] => test2
         * )
         */
        // =============================== //
        //       'Bootstrap.php'      //
        // =============================== //
    
        Bootstrap::run(new Request);
    } catch (Exception $e) {
        echo $e->getMessage();
    } 

?>