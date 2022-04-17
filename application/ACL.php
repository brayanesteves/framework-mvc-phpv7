<?php
 class ACL {
     private $_db;
     private $_referenceUser;
     private $_actions;
     private $_typesUsers;
     private $_operationUserTypeActions;
     private $_modules;

     public function __construct($referenceUser = false, $encrypted = false) {
         if($encrypted) {
            if($referenceUser) {
                $this->_referenceUser = $referenceUser;
            } else {
                if(Session::get('Rfrnc')) {
                   $this->_referenceUser = Session::get('Rfrnc');
                } else {
                   $this->_referenceUser = '4a6543bfb3c97726b8c4c44e3472ec43fde31d34';
                }
            }
         } else {
             if($referenceUser) {
                 $this->_referenceUser = (int) $referenceUser;
             } else {
                 if(Session::get('Rfrnc')) {
                    $this->_referenceUser = Session::get('Rfrnc');
                 } else {
                    $this->_referenceUser = 0;
                 }
             }
         }

         $this->_db                       = new Database();
         $this->_typesUsers               = $this->getTypesUsers();
         $this->_operationUserTypeActions = $this->getOperationUserTypeActions();
         $this->compileACL();
    }

     /**
      * Join array
      */
    public function compileACL() {
        $this->_operationUserTypeActions = array_merge($this->_operationUserTypeActions, $this->getOperationsUserType());
    }

     /**
      * Get 'UsrTyp_Rfrnc' = Reference. User Type
      */
    public function getTypesUsers() {
         $typesUser = $this->_db->query("SELECT `UsrTyp_Rfrnc` FROM `0_Usrs` WHERE `Rfrnc` = '{$this->_referenceUser}';");
         $typesUser = $typesUser->fetch();
         return $typesUser['UsrTyp_Rfrnc'];
    }

     /**
      * Returns all 'Operation User Type Actions <Reference Actions>' that are assigned to the user's user type
      */
    public function getOperationUserTypeActionsReferenceActions() {
        //$references = $this->_db->query("SELECT `Rfrnc_Actn` FROM `0_OprtnUsrTypActns` WHERE `Rfrnc_TypUsr` = '{$this->_typesUsers}';");
        $references = $this->_db->query("SELECT `Rfrnc_Actn` FROM `0_OprtnUsrTypActns` WHERE `Rfrnc_TypUsr` = '{$this->_typesUsers}';");

        $references = $references->fetchAll(PDO::FETCH_ASSOC);

        $reference = array();
        for($i = 0; $i < count($references); $i++) {
            $reference[] = $references[$i]['Rfrnc_Actn'];
        }
        return $reference;
    }

    public function getOperationUserTypeActions_Singly() {
        $operationUserTypeActions = $this->_db->query("SELECT * FROM `0_OprtnUsrTypActns` WHERE `Rfrnc_TypUsr` = '{$this->_typesUsers}';");        

        $operationUserTypeActions = $operationUserTypeActions->fetchAll(PDO::FETCH_ASSOC);
        $data                     = array();
        for($i = 0; $i < count($operationUserTypeActions); $i++) {
            $nameAction = $this->getActionsName($operationUserTypeActions[$i]['Rfrnc']);            
            if($nameAction == '') { continue; }

            if($operationUserTypeActions[$i]['Cndtn_B'] == 1) {
                $condition = true;
            } else {
                $condition = false;
            }

            $data[$i.$operationUserTypeActions[$i]['Nm']] = array(
                'nameAction'      => getActionName($operationUserTypeActions[$i]['Rfrnc_Actn']),
                'referenceAction' => getActionDescription($operationUserTypeActions[$i]['Rfrnc_Actn']),
                'condition'       => $condition,
                'herence'         => true,
                'reference'       => $operationUserTypeActions[$i]['Rfrnc_Actn']
            );
        }

        return $data;
    }

    public function getOperationUserTypeActions() {
        //$operationUserTypeActions = $this->_db->query("SELECT * FROM `0_OprtnUsrTypActns` WHERE `Rfrnc_TypUsr` = '{$this->_typesUsers}';");
        $operationUserTypeActions = $this->_db->query("SELECT `A`.`Rfrnc` AS `Rfrnc_A`, `A`.`Rfrnc_Lnk` AS `Rfrnc_Lnk_A`, `A`.`Nm` AS `Nm_A`, `A`.`Dscrptn` AS `Dscrptn_A`, 
        `A`.`Mdl_Rfrnc` AS `Mdl_Rfrnc_A`, `A`.`Rfrnc_Actn` AS `Rfrnc_Actn_A`, `A`.`Mdl_Rfrnc` AS `Mdl_Rfrnc_A`, 
        `B`.`Rfrnc` AS `Rfrnc_B`, `B`.`Nm` AS `Nm_B`, `B`.`Dscrptn` AS `Dscrptn_B`, 
        `B`.`Mdl_Rfrnc` AS `Mdl_Rfrnc_B`, `B`.`Cndtn` AS `Cndtn_B`, `B`.`Rmvd` AS `Rmvd_B`,
        `B`.`Lckd` AS `Lckd_B`, `B`.`DtAdmssn` AS `DtAdmssn_B`, 
        `B`.`ChckTm` AS `ChckTm_B`, `D`.`Nm` AS `Nm_D`, `C`.`Rfrnc_Actn` AS `Rfrnc_Actn_C`, `C`.`Cndtn` AS `Cndtn_C` FROM `0_actns` AS `A` 
        LEFT JOIN `0_mdls` AS `B` ON `B`.`Rfrnc` = `A`.`Mdl_Rfrnc`
        LEFT JOIN `0_oprtnusrtypactns` AS `C` ON `B`.`Rfrnc` = `A`.`Mdl_Rfrnc`
        INNER JOIN `0_typsusrs` AS `D` ON `D`.`Rfrnc` = `C`.`Rfrnc` WHERE `D`.`Rfrnc` = '{$this->_typesUsers}';");

        $operationUserTypeActions = $operationUserTypeActions->fetchAll(PDO::FETCH_ASSOC);
        $data                     = array();
        for($i = 0; $i < count($operationUserTypeActions); $i++) {

            if($operationUserTypeActions[$i]['Cndtn_B'] == 1) {
                $condition = true;
            } else {
                $condition = false;
            }

            $data["[". $i . "][" . strtolower($operationUserTypeActions[$i]['Nm_A'] . "_" . $operationUserTypeActions[$i]['Nm_B']) . "]"] = array(
                'key'     => strtolower($operationUserTypeActions[$i]['Nm_A'] . "_" . $operationUserTypeActions[$i]['Nm_B']),
                'name_action'     => $operationUserTypeActions[$i]['Nm_A'],
                'description_action' => $operationUserTypeActions[$i]['Dscrptn_A'],
                'name_module'     => $operationUserTypeActions[$i]['Nm_B'],
                'description_module'     => $operationUserTypeActions[$i]['Dscrptn_B'],
                'condition_module'      => $condition,
                'herence'        => true,
                'reference_operation'      => $operationUserTypeActions[$i]['Rfrnc_Actn_C']
            );
        }

        return $data;
    }
    

    /**
     * Return 'Nm' is 'key'
     */
    public function getActionsName($actionReference) {
        $actionReference = (int) $actionReference;

        $nameAction = $this->_db->query("SELECT `Nm` FROM `0_Actns` WHERE `Rfrnc_Lnk` = '{$actionReference}'");

        $nameAction = $nameAction->fetch();

        return $nameAction['Nm'];
    }

    public function getModulesName($actionReference) {
        $actionReference = (int) $actionReference;

        $nameAction = $this->_db->query("SELECT `Nm` FROM `0_Mdls` WHERE `Rfrnc` = '{$actionReference}'");

        $nameAction = $nameAction->fetch();

        return $nameAction['Nm'];
    }

    /**
     * Return 'Dscrptn' is 'Name'
     */
    public function getActionDescription($actionReference) {
        $actionReference = (int) $actionReference;

        $descriptionAction = $this->_db->query("SELECT `Dscrptn` FROM `0_Actns` WHERE `Rfrnc_Lnk` = '{$actionReference}'");

        $descriptionAction = $descriptionAction->fetch();

        return $descriptionAction['Dscrptn'];
    }

    public function getOperationsUserType_Singly() {
        $referencesActions = $this->getOperationUserTypeActionsReferenceActions();
        $actionsUsers      = $this->_db->query("SELECT * FROM `0_UsrsActns` WHERE `Rfrnc_Usr` = '{$this->_referenceUser}' AND `Rfrnc_Actn` IN ( " . implode(",", $referencesActions) . " );");
        $actionsUsers      = $actionsUsers->fetchAll(PDO::FETCH_ASSOC);
        $data              = array();

        for($i = 0; $i < count($actionsUsers); $i++) {
            $_nameAction = $this->getActionName($actionsUsers[$i]['Rfrnc_Actn']);

            if($_nameAction == '') { continue; }

            if($actionsUsers[$i]['Cndtn'] == 1) {
                $condition = true;
            } else {
                $condition = false;
            }

            $data[$_nameAction] = array(
                'nameAction'     => $_nameAction,
                'referenceActon' => $this->getActionsName($actionsUsers[$i]['Rfrnc_Actn']),
                'module' => '',
                'condition'      => $condition,
                'herence'        => false,
                'reference'      => $actionsUsers[$i]['Rfrnc_Actn']
            );
        }

        return $data;
    }

    public function getOperationsUserType() {
        $referencesActions = $this->getOperationUserTypeActionsReferenceActions();
        if(count($referencesActions)) {
            $actionsUsers = $this->_db->query("SELECT * FROM `0_UsrsActns` WHERE `Rfrnc_Usr` = '{$this->_referenceUser}' AND `Rfrnc_Actn` IN ( " . implode(",", $referencesActions) . " );");
            $actionsUsers = $actionsUsers->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $actionsUsers = array();
        }
        $data = array();

        for($i = 0; $i < count($actionsUsers); $i++) {
            $_nameAction = $this->getActionName($actionsUsers[$i]['Rfrnc_Actn']);

            if($_nameAction == '') { continue; }

            if($actionsUsers[$i]['Cndtn'] == 1) {
                $condition = true;
            } else {
                $condition = false;
            }

            $data[$_nameAction] = array(
                'nameAction'     => $_nameAction,
                'referenceActon' => $this->getActionsName($actionsUsers[$i]['Rfrnc_Actn']),
                'module' => '',
                'condition'      => $condition,
                'herence'        => false,
                'reference'      => $actionsUsers[$i]['Rfrnc_Actn']
            );
        }

        return $data;
    }

    public function _getOperationUserTypeActions() {
        if(isset($this->_operationUserTypeActions) && count($this->_operationUserTypeActions)) {
            return $this->_operationUserTypeActions;
        }
    }

    public function operationUserTypeActions($key) {
        if(array_key_exists($key, $this->_operationUserTypeActions)) {
            if($this->_operationUserTypeActions[$key]['condition_module'] == true || $this->_operationUserTypeActions[$key]['condition_module'] == 1) {
                return true;
            }
            return false;
        }
    }

    public function access($key) {
        if($this->operationUserTypeActions($key)) {
            return;
        }
        header("location:" . BASE_URL . "error/access/404");
    }

 }
?>