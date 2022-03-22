<?php
    class menuModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function fakeMenus() {
            $post = array(
                'Rfrnc' => 0,
                'Ttl' => 'Title Posts',
                'Bdy' => 'Body Post'
            );
            return $post;
        }
        public function getMenus() {
            $post = $this->_db->query("SELECT * FROM `0_Mn` AS `A` WHERE `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0 AND `Athntcd` = 0;");
            return $post->fetchAll();
        }

        public function getMenusTypeUser($user, $typeuser) {
            $post = $this->_db->query("SELECT * FROM `0_Mn` AS `A` WHERE `A`.`Cndtn` = 1 AND `A`.`Rmvd` = 0 AND `A`.`Lckd` = 0 AND `Athntcd` = 1;");
            return $post->fetchAll();
        }
    }
?>