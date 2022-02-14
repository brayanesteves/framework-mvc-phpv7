<?php
    class indexController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->_view->title = 'Front page';
            $this->_view->render('index', 'index');
        }
    }
?>