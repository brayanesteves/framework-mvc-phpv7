<?php
    class signInModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        /**
         * Check 'user' if exist
         */
        public function checkUser($user) {
            $Reference = $this->_db->query("SELECT `Rfrnc` FROM `0_Usrs` WHERE `Usrnm` = '$user';");
            if($Reference->fetch()) {
                return true;
            }
            return false;
        }

        /**
         * Check 'email' if exist
         */
        public function checkEmail($email) {
            $Reference = $this->_db->query("SELECT `Rfrnc` FROM `0_Usrs` WHERE `Eml` = '$email';");
            if($Reference->fetch()) {
                return true;
            }
            return false;
        }

        /**
         * Sign In 'user'
         */
        public function signInUser($username, $password) {
            $this->_db->prepare("INSERT INTO `0_Usrs` VALUES(NULL, :Usrnm, :Psswrd, :Rfrnc_Prsn, :UsrTyp_Rfrnc, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Usrnm' => $username, ':Psswrd' => Hash::getHash('sha1', $password, HASH_KEY), ':Rfrnc_Prsn' => 1, ':UsrTyp_Rfrnc' => 1, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
        }
    }
?>