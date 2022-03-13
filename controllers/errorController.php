<?php
    class errorController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/error
         */
        public function index() {
            $this->_view->title = 'Error';
            $this->_view->message = $this->_getError();
            $this->_view->render('index');
        }

        /**
         * Example:
         * 
         */
        public function access($code) {
            $this->_view->title = 'Error';
            $this->_view->message = $this->_getError($code);
            $this->_view->render('index');
        }

        /**
         * 
         */
        private function _getError($code = false) {
            if($code) {
                $code = $this->filterInt($code);
                if(is_int($code)) {
                    $code = $code;
                }
            } else {
                $code = 'default';
            }
            
            $error['default'] = 'An error has occurred and the page cannot be displayed';
            $error['403']     = 'Restricted access';

            if(array_key_exists($code, $error)) {
                return $error[$code];
            } else {
                return $error['default'];
            }
        }


    }
?>