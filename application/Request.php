<?php
    /**
     * 
     */
    class Request {
        private $_controller;
        private     $_method;
        private  $_arguments;
        
        public function __construct() {
            if(isset($_GET['url'])) {
                /**
                 * 
                 */
                $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                /**
                 * Create 'array' when finding eslash in url
                 * Example:
                 * 
                 */
                $url = explode('/', $url);
                /**
                 * Items that are not valid will be removed.
                 * Example:
                 * If I add several slashes to the 'url' and place a method, it removes the slashes 
                 * http://localhost/mvc-phpv7/controlller////method////arguments
                 * Clean
                 * localhost/mvc-phpv7/controlller/method/arguments
                 */
                $url = array_filter($url);
                /**
                 * 'array_shift' (extract the first item and return it)
                 */
                $this->_controller = strtolower(array_shift($url));
                $this->_method     = strtolower(array_shift($url));
                $this->_arguments  =                          $url;
            }
            /**
             *  ==========================================
             * | Assign controller, methods and arguments |
             *  ==========================================
             */



            if(!$this->_controller) {
                /**
                 * 
                 */
                $this->_controller = DEFAULT_CONTROLLER;
            }

            if(!$this->_method) {
                /**
                 * 
                 */
                $this->_method = 'index';
            }

            if(!isset($this->_arguments)) {
                $this->_arguments = array();
            }
        }

        public function getController() {
            return $this->_controller;
        }

        public function getMethod() {
            return $this->_method;
        }

        public function getArgs() {
            return $this->_arguments;
        }
    }
?>