<?php
    class indexController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            // Load First
            $this->_view->setCSS(array('styles'));
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
            $this->_view->title = 'Front page';
            $this->_view->render('index', 'index');
        }
    }
?>