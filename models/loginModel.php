<?php
    class loginModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        /**
         * 
         */
        public function getUser($user, $password) {
            $data = $this->_db->query("SELECT * FROM `0_Usrs` WHERE `Usrnm` = '$user' AND `Psswrd` = '" . Hash::getHash('sha1', $password, HASH_KEY) . "';");
            return $data->fetch();
        }
    }
?>