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

                $this->_signIn->signInUser($this->getAlphaNumber('username'), $this->escape_sql_wild('password'));

                if(!$this->_signIn->checkUser($this->getAlphaNumber('username'))) {
                    $this->_view->_error = "Error sign in user";
                    $this->_view->render('index', 'signIn');
                    exit;
                }

                $this->_view->data = false;
                $this->_view->_message = "Sign In success";
               
            }
            $this->_view->render('index', 'signIn');
        }
    }
?>