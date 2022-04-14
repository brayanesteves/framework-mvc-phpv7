<?php
    class postModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function fakePosts() {
            $post = array(
                'Rfrnc' => 0,
                'Ttl' => 'Title Posts',
                'Bdy' => 'Body Post'
            );
            return $post;
        }
        public function getPosts() {
            $post = $this->_db->query("SELECT * FROM `0_Psts` AS `A` WHERE `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0;");
            return $post->fetchAll();
        }
        public function getImgPosts() {
            $post = $this->_db->query("SELECT `A`.`Rfrnc`, `A`.`Ttl`, `A`.`Bdy`, `A`.`Rfrnc_Usr`, `A`.`Cndtn`, `A`.`Rmvd`, `A`.`Lckd`, `A`.`DtAdmssn`, `A`.`ChckTm`, `B`.`Rfrnc` AS `Rfrnc_B`, `B`.`Rfrnc_Usr` AS `Rfrnc_Usr_B`, `B`.`Rfrnc_Pst` AS `Rfrnc_Pst_B`,`B`.`Nm`, `B`.`Rt`, `B`.`Cndtn` AS `Cndtn_B`, `B`.`Rmvd` AS `Rmvd_B`, `B`.`Lckd` AS `Lckd_B`, `B`.`DtAdmssn` AS `DtAdmssn_B`, `B`.`ChckTm` AS `ChckTm_B` FROM `0_psts` AS `A` LEFT JOIN `0_imgpsts` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Pst` WHERE `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0;");
            return $post->fetchAll();
        }
        public function getPost($reference) {
            $reference = (int) $reference;
            $post = $this->_db->query("SELECT * FROM `0_Psts` AS `A` WHERE `A`.`Rfrnc` = $reference AND `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0;");
            return $post->fetch();
        }
        public function getImgPost($reference) {
            $reference = (int) $reference;
            $post = $this->_db->query("SELECT `A`.`Rfrnc`, `A`.`Ttl`, `A`.`Bdy`, `A`.`Rfrnc_Usr`, `A`.`Cndtn`, `A`.`Rmvd`, `A`.`Lckd`, `A`.`DtAdmssn`, `A`.`ChckTm`, `B`.`Rfrnc` AS `Rfrnc_B`, `B`.`Rfrnc_Usr` AS `Rfrnc_Usr_B`, `B`.`Rfrnc_Pst` AS `Rfrnc_Pst_B`,`B`.`Nm`, `B`.`Rt`, `B`.`Cndtn` AS `Cndtn_B`, `B`.`Rmvd` AS `Rmvd_B`, `B`.`Lckd` AS `Lckd_B`, `B`.`DtAdmssn` AS `DtAdmssn_B`, `B`.`ChckTm` AS `ChckTm_B` FROM `0_psts` AS `A` LEFT JOIN `0_imgpsts` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Pst` WHERE `A`.`Rfrnc` = '$reference' AND (`A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0);");
            return $post->fetch();
        }

        public function getImgPost_User($reference) {
            $reference = (int) $reference;
            $post = $this->_db->query("SELECT `A`.`Rfrnc`, `A`.`Ttl`, `A`.`Bdy`, `A`.`Rfrnc_Usr`, `A`.`Cndtn`, `A`.`Rmvd`, `A`.`Lckd`, `A`.`DtAdmssn`, `A`.`ChckTm`, `B`.`Rfrnc` AS `Rfrnc_B`, `B`.`Rfrnc_Usr` AS `Rfrnc_Usr_B`, `B`.`Rfrnc_Pst` AS `Rfrnc_Pst_B`,`B`.`Nm`, `B`.`Rt`, `B`.`Cndtn` AS `Cndtn_B`, `B`.`Rmvd` AS `Rmvd_B`, `B`.`Lckd` AS `Lckd_B`, `B`.`DtAdmssn` AS `DtAdmssn_B`, `B`.`ChckTm` AS `ChckTm_B` FROM `0_psts` AS `A` LEFT JOIN `0_imgpsts` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Pst` WHERE `A`.`Rfrnc` = '$reference' AND `A`.`Rfrnc_Usr` = '". Session::get('Rfrnc')  ."' AND (`A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0);");
            return $post->fetch();
        }
        //  ========================== //
        // |  No Encrypted 'Reference' //
        //  ========================== //
        public function create($title, $body) {
            $this->_db->prepare("INSERT INTO `0_Psts` VALUES(NULL, :Rfrnc_Usr, :Ttl, :Bdy, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm);")->execute(array(':Rfrnc_Usr' => Session::get('Rfrnc'), ':Ttl' => $title, ':Bdy' => $body, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date("H:i:s")));
        }
        public function createSaveImg($title, $body, $nameImage, $root) {
            try {
                $this->_db->beginTransaction();
                $post = $this->_db->prepare("INSERT INTO `0_Psts` VALUES(NULL, :Rfrnc_Usr, :Ttl, :Bdy, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm);")->execute(array(':Rfrnc_Usr' => Session::get('Rfrnc'), ':Ttl' => $title, ':Bdy' => $body, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date("H:i:s")));
                if($post) {
                    $lastId          = $this->_db->lastInsertId();
                    $imagePost = $this->_db->prepare("INSERT INTO `0_ImgPsts` VALUES(NULL, :Rfrnc_Usr, :Rfrnc_Pst, :Nm, :Rt, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm);")->execute(array(':Rfrnc_Usr' => Session::get('Rfrnc'), ':Rfrnc_Pst' => $lastId, ':Nm' => $nameImage, ':Rt' => $root, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date("H:i:s")));
                }
                $this->_db->commit();
            } catch( PDOExecption $e ) {
                $this->_db->rollback();
                print "Error!: " . $e->getMessage() . "</br>";
            } 
        }
        public function edit($reference, $title, $body) {
            $reference = (int) $reference;
            $this->_db->prepare("UPDATE `0_Psts` SET `Rfrnc_Usr` = :Rfrnc_Usr, `Ttl` = :Ttl, `Bdy` = :Bdy, `Cndtn` = :Cndtn, `Rmvd` = :Rmvd, `Lckd` = :Lckd WHERE `Rfrnc` = :Rfrnc;")->execute(array(':Rfrnc' => $reference, ':Rfrnc_Usr' => Session::get('Rfrnc'), ':Ttl' => $title, ':Bdy' => $body, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0));
        }
        public function delete($reference) {
            $reference = (int) $reference;
            $this->_db->prepare("DELETE `0_Psts` WHERE `Rfrnc` = :Rfrnc;")->execute(array(':Rfrnc' => $reference));
        }
        public function deleteUpdateFieldRmvd($reference) {
            $reference = (int) $reference;
            $this->_db->prepare("UPDATE `0_Psts` SET `Rfrnc_Usr` = :Rfrnc_Usr, `Rmvd` = :Rmvd WHERE `Rfrnc` = :Rfrnc;")->execute(array(':Rfrnc' => $reference, ':Rfrnc_Usr' => Session::get('Rfrnc'), ':Rmvd' => 1));
        }

        //  ========================== //
        // |   Encrypted 'Reference'   //
        //  ========================== //
        public function getPostEncrypted($reference) {
            $post = $this->_db->query("SELECT * FROM `0_Psts` AS `A` WHERE MD5(`A`.`Rfrnc`) = '$reference' AND `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0;");
            return $post->fetch();
        }
        public function getImgPostEncrypted($reference) {
            $reference = (int) $reference;
            $post = $this->_db->query("SELECT * FROM `0_Psts` AS `A` WHERE `A`.`Rfrnc` = $reference AND `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0;");
            return $post->fetch();
        }
        public function getImgPostEncrypted_User($reference) {
            $reference = (int) $reference;
            $post = $this->_db->query("SELECT `A`.`Rfrnc`, `A`.`Ttl`, `A`.`Bdy`, `A`.`Rfrnc_Usr`, `A`.`Cndtn`, `A`.`Rmvd`, `A`.`Lckd`, `A`.`DtAdmssn`, `A`.`ChckTm`, `B`.`Rfrnc` AS `Rfrnc_B`, `B`.`Rfrnc_Usr` AS `Rfrnc_Usr_B`, `B`.`Rfrnc_Pst` AS `Rfrnc_Pst_B`,`B`.`Nm`, `B`.`Rt`, `B`.`Cndtn` AS `Cndtn_B`, `B`.`Rmvd` AS `Rmvd_B`, `B`.`Lckd` AS `Lckd_B`, `B`.`DtAdmssn` AS `DtAdmssn_B`, `B`.`ChckTm` AS `ChckTm_B` FROM `0_psts` AS `A` LEFT JOIN `0_imgpsts` AS `B` ON `A`.`Rfrnc` = `B`.`Rfrnc_Pst` WHERE MD5(`A`.`Rfrnc`) = '$reference' AND MD5(`A`.`Rfrnc_Usr`) = '". md5(Session::get('Rfrnc'))  ."' AND (`A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0);");
            return $post->fetch();
        }
        public function editReferenceEncrypted($reference, $title, $body) {
            $this->_db->prepare("UPDATE `0_Psts` SET `Rfrnc_Usr` = :Rfrnc_Usr, `Ttl` = :Ttl, `Bdy` = :Bdy, `Cndtn` = :Cndtn, `Rmvd` = :Rmvd, `Lckd` = :Lckd WHERE MD5(`Rfrnc`) = :Rfrnc;")->execute(array(':Rfrnc' => $reference, ':Rfrnc_Usr' => Session::get('Rfrnc'), ':Ttl' => $title, ':Bdy' => $body, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0));
        }
        public function deleteReferenceEncrypted($reference) {
            $this->_db->prepare("DELETE `0_Psts` WHERE MD5(`Rfrnc`) = :Rfrnc;")->execute(array(':Rfrnc' => $reference));
        }
        public function deleteReferenceEncryptedUpdateFieldRmvd($reference) {
            $this->_db->prepare("UPDATE `0_Psts` SET `Rfrnc_Usr` = :Rfrnc_Usr, `Rmvd` = :Rmvd WHERE MD5(`Rfrnc`) = :Rfrnc;")->execute(array(':Rfrnc' => $reference, ':Rfrnc_Usr' => Session::get('Rfrnc'), ':Rmvd' => 1));
        }

    }
?>