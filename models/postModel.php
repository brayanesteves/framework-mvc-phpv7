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
    }
?>