<?php
    class ajaxController extends Controller {
        private $_ajax;
        public function __construct() {
            parent::__construct();
            $this->_ajax = $this->loadModel('ajax');
        }

        /**
         * Example;
         * http://localhost/mvc-phpv7/ajax/
         * 
         */

        public function index() {  
            $this->_view->title = 'AJAX';
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
            $this->_view->country = $this->_ajax->getCountry();
            $this->_view->render('index', 'ajax');            
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/ajax/getCities
         * Get 'JSON'
         */
        public function getCities() {
            if($this->getInt('country')) {
                echo json_encode($this->_ajax->getCities($this->getInt('country')));
            }
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/ajax/addCities
         * Request 'JavaScript'
         */
        public function addCities() {
            if($this->getInt('country') && $this->escape_sql_wild('cities')) {
                $this->_ajax->addCities($this->getInt('country'), $this->escape_sql_wild('cities'));
            }
        }

    }
?>