<?php
    class ajaxModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        /**
         * 
         */
        public function getCountry() {
            $data = $this->_db->query("SELECT * FROM `0_Cntry` WHERE `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0;");
            return $data->fetchAll();
        }

        public function getCities($country) {
            $data = $this->_db->query("SELECT * FROM `0_Cts` WHERE `Rfrnc_Cntry` = {$country} AND `Cndtn` = 1 AND `Rmvd` = 0 AND `Lckd` = 0;");
            /**
             * From 'JSON'
             * Array associative
             */
            $data->setFetchMode(PDO::FETCH_ASSOC);
            return $data->fetchAll();
        }

        public function addCities($referenceCountry, $cities) {
            $this->_db->prepare("INSERT INTO `0_Cts` VALUES(NULL, :Rfrnc_Cntry, :Nm, :Cndtn, :Rmvd, :Lckd, :DtAdmssn, :ChckTm);")->execute(array(':Rfrnc_Cntry' => $referenceCountry, ':Nm' => $cities, ':Cndtn' => 1, ':Rmvd' => 0, ':Lckd' => 0, ':DtAdmssn' => date('Y-m-d'), ':ChckTm' => date("H:i:s")));
        }
    }
?>