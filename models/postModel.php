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

        public function create($title, $body) {
            $this->_db->prepare("INSERT INTO `0_Psts` VALUES(NULL, :Rfrnc_Usr, :Ttl, :Bdy, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm)")->execute(array(':Rfrnc_Usr' => 1, ':Ttl' => $title, ':Bdy' => $body, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date("H:i:s")));

        }
    }
?>