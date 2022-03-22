<?php
    class loginController extends Controller {

        private $_login;
        public function __construct() {
            parent::__construct();
            $this->_login = $this->loadModel('login');
        }

        /**
         * Example: http://localhost/mvc-phpv7/login
         */
        public function index() {
            // Load First
            $this->_view->setCSS(array('styles'));
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
            $this->_view->title = "Login";
            if($this->getInt('send') == 1) {
                echo "ACA";
                $this->_view->data = $_POST;
                
                if(!$this->getAlphaNumber('username')) {
                    $this->_view->_error = "Enter user / password";
                    $this->_view->render('index', 'login');
                    exit;
                }

                if(!$this->escape_sql_wild('password')) {
                    $this->_view->_error = "Enter password";
                    $this->_view->render('index', 'login');
                    exit;
                }

                $row = $this->_login->getUser($this->getAlphaNumber('username'), $this->escape_sql_wild('password'));

                if(!$row) {
                    $this->_view->_error = "User / Password incorrect";
                    $this->_view->render('index', 'login');
                    exit;
                }

                if($row['Cndtn'] != 1) {
                    $this->_view->_error = "The user is disabled";
                    $this->_view->render('index', 'login');
                    exit;
                }

                Session::set('authenticated', true);
                Session::set('Rfrnc', $row['Rfrnc']);
                Session::set('Usrnm', $row['Usrnm']);
                Session::set('Rfrnc_Prsn', $row['Rfrnc_Prsn']);
                Session::set('UsrTyp_Rfrnc', $row['UsrTyp_Rfrnc']);
                Session::set('Cndtn', $row['Cndtn']);
                Session::set('Rmvd', $row['Rmvd']);
                Session::set('Lckd', $row['Lckd']);
                Session::set('DtAdmssn', $row['DtAdmssn']);
                Session::set('ChckTm', $row['ChckTm']);
                Session::set('Tm', time());
                
                $this->redirect();
            }
            $this->_view->render('index', 'login');
        }


        /**
         * Example:
         * http://localhost/mvc-phpv7/login/logout
         */
        public function logout() {
            Session::destroy();
            $this->redirect();
        }

        /**
         *  ================================
         * |             <TEST>             |
         *  ================================
         */

        /**
         * Example:
         * http://localhost/mvc-phpv7/login/test
         */
        public function test() {
            Session::set('authenticated', true);
            Session::set('level', 'admin');

            Session::set('var1', 'var1');
            Session::set('var2', 'var2');

            $this->redirect('login/show');
            
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/login/show
         */
        public function show() {
            echo 'Authenticated: ' . Session::get('authenticated') . '<br />';
            echo 'Level: '         . Session::get('level')         . '<br />';

            echo 'Var1: '          . Session::get('var1')          . '<br />';
            echo 'Var2: '          . Session::get('var2')          . '<br />';
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/login/logouttest
         */
        public function logouttest() {
            Session::destroy();
            $this->redirect('login/show');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/login/logouttestvar
         */
        public function logouttestvar() {
            Session::destroy(array('var1', 'var2'));
            $this->redirect('login/show');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/login/logouttestvar1
         */
        public function logouttestvar1() {
            Session::destroy('var1');
            $this->redirect('login/show');
        }

        /**
         *  ================================
         * |            <.TEST>             |
         *  ================================
         */
    }
?>