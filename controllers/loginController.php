<?php
    class loginController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        /**
         * Example: http://localhost/mvc-phpv7/login
         */
        public function index() {

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