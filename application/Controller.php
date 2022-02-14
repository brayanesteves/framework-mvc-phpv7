<?php
    abstract class Controller {
        protected $_view;

        public function __construct() {
            $this->_view = new View(new Request);
        }
        /**
         * This abstract method forces all classes that inherit from 'Controller'
         * to implement an 'index' method, even if it has no code.
         * 
         * It will default to 'Request.php' in the method:
         * if(!$this->_method) {
         *    $this->_method = 'index';
         * }
         * 
         * And if a method is sent by mistake, it will be corrected by 'Bootstrap.php'
         */
        abstract public function index();
    }
?>