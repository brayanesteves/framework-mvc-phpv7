<?php
    class signInController extends Controller {
        private $_signIn;
        public function __construct() {
            parent::__construct();
            $this->_signIn = $this->loadModel('signIn');
        }

        /**
         * Example: http://localhost/mvc-phpv7/signIn
         */
        public function index() {

            /**
             * If login 'user'
             */
            if(Session::get('authenticated')) {
                $this->redirect();
            }
            // Load First
            $this->_view->setCSS(array('styles'));
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
            $this->_view->title = "Sign In";
            if($this->getInt('signin') == 1) {
                $this->_view->data = $_POST;
                
                if(!$this->getAlphaNumber('username')) {
                    $this->_view->_error = "Enter user / password";
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                if($this->_signIn->checkUser($this->getAlphaNumber('username'))) {
                    $this->_view->_error = "User " . $this->getAlphaNumber('username') . ' exist.';
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                if(!$this->validateEmail($this->getPostParam('email'))) {
                    $this->_view->_error = "Invalid email";
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                if($this->_signIn->checkEmail($this->getPostParam('email'))) {
                    $this->_view->_error = "Email " . $this->getPostParam('email') . ' exist.';
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                if(!$this->escape_sql_wild('password')) {
                    $this->_view->_error = "Enter password";
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                if($this->getPostParam('password') != $this->getPostParam('confirm-password')) {
                    $this->_view->_error = "Passwords don't match";
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                $this->getLibrary("PHP", "php-mailer", "4.11", "class.phpmailer", 'php');
                $mail = new PHPMailer();                

                $this->_signIn->signInUserActivateAccount($this->getAlphaNumber('username'), $this->getPostParam('email'), $this->escape_sql_wild('password'));

                $user = $this->_signIn->checkUser($this->getAlphaNumber('username'));
                // if(!$this->_signIn->checkUser($this->getAlphaNumber('username'))) {
                //     $this->_view->_error = "Error sign in user";
                //     $this->_view->render('index', 'signIn');
                //     exit;
                // }

                if(!$user) {
                    $this->_view->_error = "Error sign in user";
                    $this->_view->render('index', 'signIn');
                    exit;
                }
                try {
                
                    $mail->From     = "Halcón Bit - Digital Agency";
                    $mail->FromName = "Sign In";
                    $mail->Subject  = 'Activate account user';
                    $mail->Body     = 'Hello <strong>' . $this->getAlphaNumber('username') . '</strong>,' . '<p>Registered ' . BASE_URL . '. To activate your account, click on the following link: <br/><a href="' . BASE_URL . 'signIn/activate/' . md5($user['Rfrnc']) . '/' . $user['ActvtnCd_SHA256'] . '">Activate account</a></p>';
                    $mail->AltBody  = 'Your email server does not support HTML';
                    $mail->AddAddress($this->getPostParam('email'));
                    $mail->send();

                    $this->_view->data = false;
                    $this->_view->_message = "Sign In success. Check your email to activate your account";
                } catch (Exception $e) {
                    $this->_view->_error = $e->getMessage();
                    $this->_view->render('index', 'signIn');
                    exit;
                }
               
            }
            $this->_view->render('index', 'signIn');
        }

        /**
         * Nomenclature: http://localhost/mvc-phpv7/signIn/<reference>/<ActvtnCd>
         */
        public function activate($reference, $ActvtnCd) {
            if(!$this->filterIntEncrypted($reference) || !$this->filterIntEncrypted($ActvtnCd)) {
                $this->_view->_error = "This account does not exist";
                $this->_view->render('activate', 'signIn');
                exit;
            }
            $row = $this->_signIn->getUser(md5($reference), $this->filterIntEncrypted($ActvtnCd));
            
            if(!$row) {
                $this->_view->_error = "This account does not exist";
                $this->_view->render('activate', 'signIn');
                exit;
            }

            if($row['Cndtn'] == 1) {
                $this->_view->_message = "This account has been activated.";
                $this->_view->render('activate', 'signIn');
                exit;
            }

            $this->_signIn->activateUser(md5($reference), $ActvtnCd);

            $row = $this->_signIn->getUser(md5($reference), $this->filterIntEncrypted($ActvtnCd));

            if($row['Cndtn'] == 0) {
                $this->_view->_error = "Error activating account, please try again later.";
                $this->_view->render('activate', 'signIn');
                exit;
            }
            $this->_view->_message = "Your account has been activated.";
            $this->_view->render('activate', 'signIn');
        }
    }
?>