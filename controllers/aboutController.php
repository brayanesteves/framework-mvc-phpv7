<?php
    class aboutController extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->_view->title = 'About';
            $this->_view->render('index', 'about');
        }
    }
?>