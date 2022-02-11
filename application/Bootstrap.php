<?php
    class Bootstrap {
        /**
         * @param $request
         */
        public static function run(Request $request) {
            $controller     =         $request->getController() . 'Controller';
            $rootController = ROOT . 'controllers' . DS . $controller . '.php';
            
            $mehod          = $request->getMethod();
            $arguments      =   $request->getArgs();
            /**
             * Test:
             * echo $rootController;
             * exit;
             */
            
             /**
              * Check if file exists
              */
            if(is_readable($rootController)) {
                require_once $rootController;
                $controller = new $controller;
                if(is_callable(array($controller, $mehod))) {  
                    $method = $request->getMethod();
                } else {
                    $mehod = 'index';
                }

                if(isset($arguments)) {
                    /**
                     * 
                     */
                    call_user_func_array(array($controller, $mehod), $arguments);
                } else {
                    /**
                     * 
                     */
                    call_user_func(array($controller, $mehod));
                }
            } else {
                throw new Exception('Not found');
            }
        }
    }
?>