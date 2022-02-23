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

        /**
         * 
         */
        protected function loadModel($model) {
            $model = $model . 'Model';
            $rootModel = ROOT . 'models' . DS . $model . '.php';
            if(is_readable($rootModel)) {
                require_once $rootModel;    
                $model = new $model;
                return $model;
            } else {
                throw new Exception('Error model');
            }
        }

        protected function getLibrary($folder, $library, $version, $mainFile, $extension) {
            $rootLibrary = ROOT . 'libs' . DS . $folder . DS . $library . DS . 'version/' . $version . DS . $mainFile .'.' . $extension;
            if(is_readable($rootLibrary)) {
                require_once $rootLibrary;
            } else {
                throw new Exception('Error library');
            }
        }

        protected function getText($key) {
            if(isset($_POST[$key]) && !empty($_POST[$key])) {
                $_POST[$key] = htmlspecialchars($_POST[$key], ENT_QUOTES, 'UTF-8');
                return $_POST[$key];
            }
            return '';
        }

        protected function getInt($key) {
            if(isset($_POST[$key]) && !empty($_POST[$key])) {
                $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT);
                return $_POST[$key];
            }
            return 0;
        }

        protected function redirect($root = false) {
            if($root) {
                header('location:' . BASE_URL . $root);
                exit;
            } else {
                header('location:' . BASE_URL);
                exit;
            }
        }
    }
?>