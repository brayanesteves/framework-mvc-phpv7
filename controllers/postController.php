<?php
    class postController extends Controller {
        private $_post;
        public function __construct() {
            parent::__construct();
            $this->_post = $this->loadModel('post');
        }

        public function index() {            
            $this->_view->posts = $this->_post->getPosts();
            $this->_view->title = 'Posts';
            $this->_view->render('index', 'post');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/post/create
         */
        public function create() {
            $this->_view->title = 'New Post';
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
            /**
             * Process 'data'
             */
            if($this->getInt('save') == 1) {
                /**
                 * Return params '$_POST'
                 */
                $this->_view->data = $_POST;
                if(!$this->getText('title')) {
                    $this->_view->_error = 'Insert title...';
                    $this->_view->render('create', 'post');
                    exit;
                }
                if(!$this->getText('body')) {
                    $this->_view->_error = 'Insert body...';
                    $this->_view->render('create', 'post');
                    exit;
                }
                $this->_post->create($this->getText('title'), $this->getText('body'));
                $this->redirect('post');
            }
            $this->_view->render('create', 'post');
        }
    }
?>