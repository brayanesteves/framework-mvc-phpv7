<?php
    class encryptController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));

            $this->_view->title = 'Encrypted';
            $this->_view->render('index', 'encrypted');
        }
    }
?>