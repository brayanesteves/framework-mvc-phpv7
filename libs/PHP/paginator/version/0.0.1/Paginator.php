<?php
    /**
     * Paginator version 0.0.1
     */
    class Paginator {
        /**
         * Data return paginator
         */
        private $_data;
        /**
         * Store data paginator
         */
        private $_pagination;

        public function __construct() {
            $this->_data      = array();
            $this->_paginator = array();
        }

        /**
         * @param $query {}
         * @param $page  {}
         * @param $limit {Account page}
         */
        public function paginate($query, $page = false, $limit = false, $pagination = false) {
            if($limit && is_numeric($limit)) {
                $limit = $limit;
            } else {
                $limit = 10;
            }

            if($page && is_numeric($page)) {
                $page = $page;
                /**
                 * (page - 1) * limit
                 * Example:
                 * (2 - 1) * 10
                 * (1) * 10
                 * 10
                 */
                $init = ($page - 1) * $limit;
            } else {
                $page  = 1;
                $init  = 0;
            }

            $record                = count($query);
            $total                 = ceil($record / $limit);
            $this->_data     = array_slice($query, $init, $limit);

            $pagination            = array();
            $pagination['current'] = $page;
            $pagination['total']   = $total;

            /**
             * First & Previous
             */
            if($page > 1) {
                $pagination['first']    = 1;
                $pagination['previous'] = $page - 1;
            } else {
                $pagination['first']    = '';
                $pagination['previous'] = '';
            }

            /**
             * Last & Next
             */
            if($page < $total) {
                $pagination['last'] = $total;
                $pagination['next'] = $page + 1;
            } else {
                $pagination['last'] = '';
                $pagination['next'] = '';
            }

            $this->_pagination = $pagination;
            $this->_getRangePagination($pagination);

            return $this->_data;
        }

        private function _getRangePagination($limit = false) {
            if($limit && is_numeric($limit)) {
                $limit = $limit;
            } else {
                $limit = 10;
            }

            $totalPages    = $this->_pagination['total'];
            $selectedPages = $this->_pagination['current'];
            $range         = ceil($limit / 2);
            $pages         = array();
            /**
             * Range right
             */
            $rangeRight = $totalPages - $selectedPages;
            if($rangeRight < $range) {
                $residue = $range - $rangeRight;
            } else {
                $residue = 0;
            }

            /**
             * Range left
             */
            $rangeLeft = $selectedPages - ($range + $residue);

            /**
             * 
             */
            for($i = $selectedPages; $i > $rangeLeft; $i--) {
                if($i == 0) {
                    break;
                }
                $pages[] = $i;
            }
            
            sort($pages);

            /**
             * 
             */
            if($selectedPages < $range) {
                $rangeRight = $limit;
            } else {
                $rangeRight = $selectedPages + $range;
            }

            for($i = $selectedPages + 1; $i <= $rangeRight; $i++) {
                if($i > $totalPages) {
                    break;
                }

                $pages[] = $i;
            }

            $this->_pagination['range'] = $pages;

            return $this->_pagination;
        }

        /**
         * Create 'view' pagination
         */
        public function getView($view, $extension = false, $link = false) {
            if($extension) {
                $ext = $extension;
            } else {
                $ext = 'php';
            }
            $rootView = ROOT . 'views' . DS . 'pager' . DS . $view . '.' . $ext;
            if($link) {
                $link = BASE_URL . $link . '/';
            }

            if(is_readable($rootView)) {
                /**
                 * Open the 'buffer'
                 */
                ob_start();

                include $rootView;

                /**
                 * 'ob_get_contents()' => Store 'buffer'
                 */
                $content = ob_get_contents();

                /**
                 * Clean 'buffer'
                 */
                ob_end_clean();
                
                return $content;
            }
            throw new Exception("Error pagination");
        }

        public function getRangePagination($limit = false) {
            if($limit && is_numeric($limit)) {
                $limit = $limit;
            } else {
                $limit = 10;
            }

            $totalPages    = $this->_pagination['total'];
            $selectedPages = $this->_pagination['current'];
            $range         = ceil($limit / 2);
            $pages         = array();
            /**
             * Range right
             */
            $rangeRight = $totalPages - $selectedPages;
            if($rangeRight < $range) {
                $residue = $range - $rangeRight;
            } else {
                $residue = 0;
            }

            /**
             * Range left
             */
            $rangeLeft = $selectedPages - ($range + $residue);

            /**
             * 
             */
            for($i = $selectedPages; $i > $rangeLeft; $i--) {
                if($i == 0) {
                    break;
                }
                $pages[] = $i;
            }
            
            sort($pages);

            /**
             * 
             */
            if($selectedPages < $range) {
                $rangeRight = $limit;
            } else {
                $rangeRight = $selectedPages + $range;
            }

            for($i = $selectedPages + 1; $i <= $rangeRight; $i++) {
                if($i > $totalPages) {
                    break;
                }

                $pages[] = $i;
            }

            $this->_pagination['range'] = $pages;

            return $this->_pagination;
        }

        public function getPagination() {
            if($this->_pagination) {
                return $this->_pagination;
            } else {
                return false;
            }
        }

    }
?>