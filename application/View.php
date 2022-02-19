<?php
    /**
     * 
     */
    class View {
        private $_controller;

        /**
         * @param $request is 'application/Request.php'
         */
        public function __construct(Request $request) {
            $this->_controller = $request->getController();
        }

        /**
         * @param $view
         * @param $item
         */
        public function render($view, $item = false) {

            $menu = array(
                array('Rfrnc' => 'index', 'title' => 'Home', 'link' => BASE_URL),
                array('Rfrnc' => 'about', 'title' => 'About', 'link' => BASE_URL . 'about'),
                array('Rfrnc' => 'pdf', 'title' => 'PDF', 'link' => BASE_URL . 'pdf/testPDF/Halcon/Bit'),
            );

            $_layoutParams = array(
                'root_css' => BASE_URL . 'views/layouts/' . DEFAULT_LAYOUT . '/assets/css/',
                'root_img' => BASE_URL . 'views/layouts/' . DEFAULT_LAYOUT . '/assets/img/',
                'root_js'  => BASE_URL . 'views/layouts/' . DEFAULT_LAYOUT . '/assets/js/',
                'libs_js'  => BASE_URL . 'libs/JS/',
                'menu'     => $menu
            );
            /**
             * 
             */
            $rootView = ROOT . 'views' . DS . $this->_controller . DS . $view . '.phtml';

            if(is_readable($rootView)) {
                include_once ROOT . 'views' . DS . 'layouts' . DS . DEFAULT_LAYOUT . DS . 'header.php';
                include_once $rootView;
                include_once ROOT . 'views' . DS . 'layouts' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
            } else {
                throw new Exception('Error view');
            }

            
        }
    }
?>