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
         * Check 'user' if exist
         */
        public function checkUserActvtnCd($user) {
            $Reference = $this->_db->query("SELECT `A`.`Usrnm`, `B`.`Eml`, `C`.`ActvtnCd_Rndm`, `C`.`ActvtnCd_MD5`, `C`.`ActvtnCd_SHA256` FROM `0_Usrs` AS `A` LEFT JOIN `0_UsrsEmls` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Usrs` LEFT JOIN `0_UsrEmlActvtn` AS `C` ON `C`.`Rfrnc_Usrs` = `B`.`Rfrnc_Usrs` WHERE `A`.`Usrnm` = '$user';");
            return $Reference->fetch();        
        }    

        /**
         * Check 'email' if exist
         */
        public function checkEmail($email) {
            $Reference = $this->_db->query("SELECT `Rfrnc` FROM `0_UsrsEmls` WHERE `Eml` = '$email';");
            if($Reference->fetch()) {
                return true;
            }
            return false;
        }

        /**
         * Check 'email' if exist
         */
        public function checkEmailActvtnCd($email) {
            $Reference = $this->_db->query("SELECT `A`.`Usrnm`, `B`.`Eml`, `C`.`ActvtnCd_Rndm`, `C`.`ActvtnCd_MD5`, `C`.`ActvtnCd_SHA256` FROM `0_Usrs` AS `A` LEFT JOIN `0_UsrsEmls` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Usrs` LEFT JOIN `0_UsrEmlActvtn` AS `C` ON `C`.`Rfrnc_Usrs` = `B`.`Rfrnc_Usrs` WHERE `B`.`Eml` = '$email';");
            return $Reference->fetch();
        }

        /**
         * Sign In 'user'
         */
        public function signInUser($username, $password) {
            try { 
                $this->_db->prepare("INSERT INTO `0_Usrs` VALUES(NULL, :Usrnm, :Psswrd, :Rfrnc_Prsn, :UsrTyp_Rfrnc, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Usrnm' => $username, ':Psswrd' => Hash::getHash('sha1', $password, HASH_KEY), ':Rfrnc_Prsn' => 1, ':UsrTyp_Rfrnc' => 1, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
            } catch( PDOExecption $e ) {
                $this->_db->rollback();
                print "Error!: " . $e->getMessage() . "</br>";
            } 
        }
        public function signInUserEmail($username, $email, $password) {
            try {
                $this->_db->beginTransaction();
                $user   = $this->_db->prepare("INSERT INTO `0_Usrs` VALUES(NULL, :Usrnm, :Psswrd, :Rfrnc_Prsn, :UsrTyp_Rfrnc, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Usrnm' => $username, ':Psswrd' => Hash::getHash('sha1', $password, HASH_KEY), ':Rfrnc_Prsn' => 1, ':UsrTyp_Rfrnc' => 1, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));            
                if($user) {
                    $lastId          = $this->_db->lastInsertId();                
                    $UsersEmails     = $this->_db->prepare("INSERT INTO `0_UsrsEmls`     VALUES(NULL, :Rfrnc_Usrs, :Eml, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Rfrnc_Usrs' => $lastId, ':Eml' => $email, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
                }
                $this->_db->commit();
            } catch( PDOExecption $e ) {
                $this->_db->rollback();
                print "Error!: " . $e->getMessage() . "</br>";
            } 
        }
        public function signInUserActivateAccount($username, $email, $password) {
            try {
                $this->_db->beginTransaction();
                $user = $this->_db->prepare("INSERT INTO `0_Usrs` VALUES(NULL, :Usrnm, :Psswrd, :Rfrnc_Prsn, :UsrTyp_Rfrnc, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Usrnm' => $username, ':Psswrd' => Hash::getHash('sha1', $password, HASH_KEY), ':Rfrnc_Prsn' => 1, ':UsrTyp_Rfrnc' => 1, ':Cndtn' => 0, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
                if($user) {
                    $lastId          = $this->_db->lastInsertId();   
                    $ActvtnCd_Rndm   = rand(1782598471, 9999999999);
                    $ActvtnCd_MD5    = Hash::getHash(   'md5', $lastId . $username . $email . date('Y-m-d') . date('H:i:s'), HASH_KEY);
                    $ActvtnCd_SHA256 = Hash::getHash('sha256', $lastId . $username . $email . date('Y-m-d') . date('H:i:s'), HASH_KEY);
                    $UsersEmails     = $this->_db->prepare("INSERT INTO `0_UsrsEmls`     VALUES(NULL, :Rfrnc_Usrs, :Eml, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Rfrnc_Usrs' => $lastId, ':Eml' => $email, ':Cndtn' => 0, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
                    $UsrEmlActvtn    = $this->_db->prepare("INSERT INTO `0_UsrEmlActvtn` VALUES(NULL, :Rfrnc_Usrs, :ActvtnCd_Rndm, :ActvtnCd_MD5, :ActvtnCd_SHA256, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Rfrnc_Usrs' => $lastId, ':ActvtnCd_Rndm' => $ActvtnCd_Rndm, ':ActvtnCd_MD5' => $ActvtnCd_MD5, ':ActvtnCd_SHA256' => $ActvtnCd_SHA256, ':Cndtn' => 0, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date('H:i:s')));
                }
                $this->_db->commit();
            } catch( PDOExecption $e ) {
                $this->_db->rollback();
                print "Error!: " . $e->getMessage() . "</br>";
            } 
        }

        public function getUser($Rfrnc_Usrs, $ActvtnCd_SHA256) {
            $user = $this->_db->prepare("SELECT `A`.`Rfrnc`, `A`.`Usrnm`, `A`.`Cndtn`, `B`.`Eml`, `C`.`ActvtnCd_Rndm`, `C`.`ActvtnCd_MD5`, `C`.`ActvtnCd_SHA256` FROM `0_Usrs` AS `A` LEFT JOIN `0_UsrsEmls` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Usrs` LEFT JOIN `0_UsrEmlActvtn` AS `C` ON `C`.`Rfrnc_Usrs` = `B`.`Rfrnc_Usrs` WHERE MD5(`A`.`Rfrnc`) = '$Rfrnc_Usrs' AND `C`.`ActvtnCd_SHA256` = '$ActvtnCd_SHA256';");
            return $user->fetch();
        }

        /**
         * Activate 'user'
         */
        public function activateUser($Rfrnc_Usrs, $ActvtnCd_SHA256) {
            $user = $this->_db->query("UPDATE `0_Usrs` SET `Cndtn` = 1 WHERE MD5(`Rfrnc`) = '$Rfrnc_Usrs';");
            if($user) {
                $UsrsEmls = $this->_db->query("UPDATE `0_UsrsEmls` SET `Cndtn` = 1 WHERE MD5(`Rfrnc`) = '$Rfrnc_Usrs';");
                if($UsrsEmls) {
                    $UsrEmlActvtn = $this->_db->query("UPDATE `0_UsrEmlActvtn` SET `Cndtn` = 1 WHERE MD5(`Rfrnc`) = '$Rfrnc_Usrs' AND `ActvtnCd_SHA256` = '$ActvtnCd_SHA256';");
                }
            }
        }
    }
?>