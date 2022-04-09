<?php
    class postController extends Controller {
        private $_post;
        public function __construct() {
            parent::__construct();
            $this->_post = $this->loadModel('post');
        }

        /**
         * Example;
         * http://localhost/mvc-phpv7/post/
         * 
         * If '$page' is equal 'true'
         * http://localhost/mvc-phpv7/post/index/2
         * 
         */

        public function index($page = false) {  

            if(!$this->filterInt($page)) {
                /**
                 * Example:
                 * http://localhost/mvc-phpv7/post/
                 */
                $page = false;
            } else {
                /**
                 * Example:
                 * http://localhost/mvc-phpv7/post/2
                 */
                $page = (int) $page;
            }
            /**
             * Include library 'paginator'
             */
            $this->getLibrary("PHP", "paginator", "0.0.1", "Paginator", 'php');
            $paginator = new Paginator();
            
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
                     
            $this->_view->posts = $paginator->paginate($this->_post->getPosts(), $page);
            $this->_view->pagination = $paginator->getView('test', 'phtml', 'post/index');
            $this->_view->title = 'Posts';
            $this->_view->render('index', 'post');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/post/normal
         */
        public function normal() {              
            
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
                     
            $this->_view->posts = $this->_post->getPosts();
            $this->_view->title = 'Posts';
            $this->_view->render('index', 'post');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/post/create
         */
        public function create() {
            Session::access('admin');
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
                $this->_post->create($this->getPostParam('title'), $this->getPostParam('body'));
                $this->redirect('post');
            }
            $this->_view->render('create', 'post');
        }

        /**
         * Encrypted | No Encrypted
         * http://localhost/mvc-phpv7/post/edit/<$reference>
         * Example:
         * No Encrypted
         * http://localhost/mvc-phpv7/post/edit/1ç
         * Encrypted
         * http://localhost/mvc-phpv7/post/edit/eccbc87e4b5ce2fe28308fd9f2a7baf3
         */
        public function edit($reference) {
            
            /**
             * No Encrypted 'Reference'
             */
            //$reference = (int) $reference;
            //if(!$this->filterInt($reference)) {
            //    $this->redirect('post');
            //}
            /**
             * Encrypted
             */
            $reference = $reference;
            if(!$this->filterIntEncrypted($reference)) {
                $this->redirect('post');
            }
            /**
             * No Encrypted 'Reference'
             */
            //if(!$this->_post->getPost($this->filterInt($reference))) {
            //    $this->redirect('post');
            //}
            /**
             * Encrypted
             */
            if(!$this->_post->getPostEncrypted($reference)) {
                $this->redirect('post');
            }
            $this->_view->title = "Edit Post";
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));

            /**
             * Process 'data'
             */
            if($this->getInt('edit') == 1) {
                /**
                 * Return params '$_POST'
                 */
                $this->_view->data = $_POST;
                if(!$this->getText('title')) {
                    $this->_view->_error = 'Insert title...';
                    $this->_view->render('edit', 'post');
                    exit;
                }
                if(!$this->getText('body')) {
                    $this->_view->_error = 'Insert body...';
                    $this->_view->render('edit', 'post');
                    exit;
                }
                $this->_post->editReferenceEncrypted($this->filterIntEncrypted($reference), $this->getText('title'), $this->getText('body'));
                $this->redirect('post');
            }
            $this->_view->data = $this->_post->getPostEncrypted($reference);
            $this->_view->render('edit', 'post');
        }

        /**
         * Encrypted | No Encrypted
         * http://localhost/mvc-phpv7/post/delete/<$reference>
         * Example:
         * No Encrypted
         * http://localhost/mvc-phpv7/post/delete/1
         * Encrypted
         * http://localhost/mvc-phpv7/post/delete/eccbc87e4b5ce2fe28308fd9f2a7baf3
         */
        public function delete($reference) {
               
            /**
             * No Encrypted 'Reference'
             */
            //$reference = (int) $reference;
            //if(!$this->filterInt($reference)) {
            //    $this->redirect('post');
            //}
            /**
             * Encrypted
             */
            $reference = $reference;
            if(!$this->filterIntEncrypted($reference)) {
                $this->redirect('post');
            }
            /**
             * No Encrypted 'Reference'
             */
            //if(!$this->_post->getPost($this->filterInt($reference))) {
            //    $this->redirect('post');
            //}
            /**
             * Encrypted
             */
            //if(!$this->_post->getPostEncrypted($reference)) {
            //    $this->redirect('post');
            //}
            $this->_post->deleteReferenceEncryptedUpdateFieldRmvd($reference);
            $this->redirect('post');
        }

        /**
         * Example:
         * http://localhost/mvc-phpv7/post/test
         * 
         * If '$page' is equal 'true'
         * http://localhost/mvc-phpv7/post/test/index/2
         */
        public function test($page = false) {
            if(!$this->filterInt($page)) {
                /**
                 * Example:
                 * http://localhost/mvc-phpv7/post/
                 */
                $page = false;
            } else {
                /**
                 * Example:
                 * http://localhost/mvc-phpv7/post/2
                 */
                $page = (int) $page;
            }
            /**
             * Include library 'paginator'
             */
            $this->getLibrary("PHP", "paginator", "0.0.1", "Paginator", 'php');
            $paginator = new Paginator();
            
            // Load First
            $this->_view->setLibsCSSJS(array('bootstrap/version/5.1.3/dist/css/bootstrap.min'), 0);
            $this->_view->setLibsJS(array('angular.js/version/1.8.2/angular.min', 'jquery/version/3.6.0/js/jquery-3.6.0.min'));
            // Load Second
            $this->_view->setJS(array('main'));
                     
            $this->_view->posts = $paginator->paginate($this->_post->getPosts(), $page);
            $this->_view->pagination = $paginator->getView('test', 'phtml', 'post/test');
            $this->_view->title = 'Posts';
            $this->_view->render('test', 'post');
        }
    }
?>