<?php
    class Session {
        /**
         * 
         */
        public static function init() {
            session_start();
        }

        /**
         * It is to destroy the session, session variables or a session variable, sent in an array
         */
        public static function destroy($key = false) {
            if($key) {
                if(is_array($key)) {
                    for($i = 0; $i < count($key); $i++) {
                        if(isset($_SESSION[$key[$i]])) {
                            unset($_SESSION[$key[$i]]);
                        }
                    }
                } else {
                    if(isset($_SESSION[$key])) {
                        unset($_SESSION[$key]);
                    }
                }
            } else {
                session_destroy();
            }
        }

        public static function set($key, $value) {
            if(!empty($key)) {
                $_SESSION[$key] = $value;
            }
        }

        public static function get($key) {
            if(isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }

        /**
         * @param int $level {Level user}
         */
        public static function access($level) {
            if(!Session::get('authenticated')) {
                header('location:' . BASE_URL . 'error/access/403');
                exit;
            }

            if(Session::getLevel($level) > Session::getLevel(Session::get('level'))) {
                header('location:' . BASE_URL . 'error/access/403');
                exit;
            }
        }

        public static function accessView($level) {
            if(!Session::get('authenticated')) {
                return false;
            }

            if(Session::getLevel($level) > Session::getLevel(Session::get('UsrTyp_Rfrnc'))) {
                return false;
            }

            return true;
        }

        public static function getLevel($level) {
            $role['admin']   = 3;
            $role['visitor'] = 2;
            $role['user']    = 1;
            if(!array_key_exists($level, $role)) {
                throw new Exception('Error access');
            } else {
                return $role[$level];
            }
        }
    }
?>