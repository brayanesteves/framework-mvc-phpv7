# <ENGLISH: USERS / SPANISH: USUARIOS>
# <0 - USUARIOS: INSERTAR DATOS>
# <.ENGLISH: USERS / SPANISH: USUARIOS>

# <ENGLISH: TYPES OF USERS / SPANISH: TIPOS DE USUARIOS>
# <ACCIONES: INSERTAR DATOS> 
# <00000 - MÓDULO: USUARIOS (USRS)[CRUD]>
INSERT INTO `MIPSS_`.`0_TypsUsrs` (`Rfrnc`, `Nm`, `Dscrptn`, `Lvl`, `Cndtn`, `Rmvd`,`Lckd`, `DtAdmssn`, `ChckTm`) VALUES ('00000', 'Mngr', 'English: Manager / Spanish: Administrador', 0, 1, 0, 0, "0001-01-01", "00:00:00");
# </ACCIONES: INSERTAR DATOS>
# <.ENGLISH: TYPES OF USERS / SPANISH: TIPOS DE USUARIOS>

# <ENGLISH: OPERATION. USER TYPE ACTIONS / SPANISH: OPERACIÓN. ACCIONES DE TIPOS DE USUARIOS>
# <ACCIONES: INSERTAR DATOS>
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 1, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 2, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 3, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 4, 1, 0, 0, "0001-01-01", "00:00:00");
# </ACCIONES: INSERTAR DATOS>
# <.ENGLISH: OPERATION. USER TYPE ACTIONS / SPANISH: OPERACIÓN. ACCIONES DE TIPOS DE USUARIOS>

# <ENGLISH: ACTIONS / SPANISH: ACCIONES>
# <ENGLISH: ACTIONS. INSERT DATA / SPANISH: ACCIONES. INSERTAR DATOS>
# <ENGLISH: 00000 - MODULE. USERS (USRS)[CRUD] / SPANISH: 00000 - MÓDULO. USUARIOS (USRS)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`, `Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 1, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`, `Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 1, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`, `Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 1, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`, `Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 1, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00000 - MODULE. USERS (USRS)[CRUD] / SPANISH: 00000 - MÓDULO. USUARIOS (USRS)[CRUD]>

# <ENGLISH: 00001 - MODULE. TYPE OF USER (TYPUSR)[CRUD] / SPANISH: 00001 - MÓDULO. TIPO DE USUARIO (TPUSR)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 2, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 2, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 2, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 2, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00001 - MODULE. TYPE OF USER (TYPUSR)[CRUD] / SPANISH: 00001 - MÓDULO. TIPO DE USUARIO (TPUSR)[CRUD]>

# <ENGLISH: 00002 - MODULE. PERSON (PRSN)[CRUD] / SPANISH: 00002 - MÓDULO. PERSONA (PRSN)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 3, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 3, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 3, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 3, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00002 - MODULE. PERSON (PRSN)[CRUD] / SPANISH: 00002 - MÓDULO. PERSONA (PRSN)[CRUD]>

# <ENGLISH: 00003 - MODULE. PRODUCT (PRDCT)[CRUD] / SPANISH: 00003 - MÓDULO. PRODUCTO (PRDCT)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 4, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 4, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 4, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 4, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00003 - MODULE. PRODUCT (PRDCT)[CRUD] / SPANISH: 00003 - MÓDULO. PRODUCTO (PRDCT)[CRUD]>

# <ENGLISH: 00004 - MODULE. PURCHASE INVOICE (PRCHS_INVC)[CRUD] / SPANISH: 00004 - MÓDULO. FACTURA DE COMPRA (FCTR_CMPR)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 5, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 5, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 5, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 5, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00004 - MODULE. PURCHASE INVOICE (PRCHS_INVC)[CRUD] / SPANISH: 00004 - MÓDULO. FACTURA DE COMPRA (FCTR_CMPR)[CRUD]>

# <ENGLISH: 00005 - MODULE. PURCHASED PRODUCTS (PRCHSD_PRDCTS)[CRUD] / SPANISH: 00005 - MÓDULO. PRODUCTOS COMPRADOS (PRDCTS_CMPRDS)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 6, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 6, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 6, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 6, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00005 - MODULE. PURCHASED PRODUCTS (PRCHSD_PRDCTS)[CRUD] / SPANISH: 00005 - MÓDULO. PRODUCTOS COMPRADOS (PRDCTS_CMPRDS)[CRUD]>

# <ENGLISH: 00006 - MODULE. PRODUCTS ON SALE (PRDCTS_SL)[CRUD] / SPANISH: 00006 - MÓDULO. PRODUCTOS EN VENTAS (PRDCTS_VNTS)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 7, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 7, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 7, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 7, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00006 - MODULE. PRODUCTS ON SALE (PRDCTS_SL)[CRUD] / SPANISH: 00006 - MÓDULO. PRODUCTOS EN VENTAS (PRDCTS_VNTS)[CRUD]>

# <ENGLISH: 00007 - MODULE. BILL OF SALE (BLL_SL)[CRUD] / SPANISH: 00007 - MÓDULO. FACTURA DE VENTA (FCTR_VNT)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 8, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 8, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 8, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 8, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00007 - MODULE. BILL OF SALE (BLL_SL)[CRUD] / SPANISH: 00007 - MÓDULO. FACTURA DE VENTA (FCTR_VNT)[CRUD]>

# <ENGLISH: 00008 - MODULE. PURCHASE NOTE (PRCHS_NT)[CRUD] / SPANISH: 00008 - MÓDULO. NOTA DE COMPRA (NT_CMPR)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 9, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 9, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 9, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 9, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00008 - MODULE. PURCHASE NOTE (PRCHS_NT)[CRUD] / SPANISH: 00008 - MÓDULO. NOTA DE COMPRA (NT_CMPR)[CRUD]>

# <ENGLISH: 00009 - MODULE. SALE NOTE (SL_NT)[CRUD] / SPANISH: 00009 - MÓDULO. NOTA DE VENTA (NT_VNT)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 10, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 10, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 10, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 10, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 00009 - MODULE. SALE NOTE (SL_NT)[CRUD] / SPANISH: 00009 - MÓDULO. NOTA DE VENTA (NT_VNT)[CRUD]>

# <ENGLISH: 000010 - MODULE. DELIVERY NOTE (DLVRY_NT)[CRUD]  / SPANISH: 000010 - MÓDULO. NOTA DE ENTREGA (NT_VNT)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 11, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 11, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 11, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 11, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 000010 - MODULE. DELIVERY NOTE (DLVRY_NT)[CRUD]  / SPANISH: 000010 - MÓDULO. NOTA DE ENTREGA (NT_VNT)[CRUD]>

# <ENGLISH: 000010 - MODULE. POSTS (PSTS)[CRUD]  / SPANISH: 000010 - MÓDULO. PUBLICACIONES (PBLCCNS)[CRUD]>
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1,  'Add', 'English: Add    / Spanish: Agregar',    NULL, 12, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 2, 'Updt', 'English: Update / Spanish: Actualizar', NULL, 12, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 3,  'Dlt', 'English: Delete / Spanish: Eliminar',   NULL, 12, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Actns` (`Rfrnc`, `Rfrnc_Lnk`, `Nm`, `Dscrptn`,`Rfrnc_Actn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 4, 'Srch', 'English: Search / Spanish: Buscar',     NULL, 12, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: 000010 - MODULE. POSTS (PSTS)[CRUD]  / SPANISH: 000010 - MÓDULO. PUBLICACIONES (PNLCCNS)[CRUD]>

# <.ENGLISH: ACTIONS. INSERT DATA / SPANISH: ACCIONES. INSERTAR DATOS>
# <.ENGLISH: ACTIONS / SPANISH: ACCIONES>

# <ENGLISH: MODULE / SPANISH: MÓDULOS>
# <ENGLISH: MODULES. INSERT DATA / SPANISH: MÓDULOS. INSERTAR DATOS>
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,          'Usrs', 'English: Users              / Spanish: Usuarios',            NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,        'TypUsr', 'English: Type of User       / Spanish: Tipo de Usuario',     NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,          'Prsn', 'English: Person             / Spanish: Persona',             NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,         'Prdct', 'English: Product            / Spanish: Producto',            NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,    'Prchs_Invc', 'English: Purchase Invoice   / Spanish: Factura de Compra',   NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 'Prchsd_Prdcts', 'English: Purchased Products / Spanish: Productos Comprados', NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,     'Prdcts_Sl', 'English: Products on Sale   / Spanish: Productos en Ventas', NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,        'Bll_Sl', 'English: Bill of Sale       / Spanish: Factura de Ventas',   NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,      'Prchs_Nt', 'English: Purchase Note      / Spanish: Nota de Compra',      NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,         'Sl_Nt', 'English: Sale Note          / Spanish: Nota de Venta',       NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,      'Dlvry_Nt', 'English: Delivery Note      / Spanish: Nota de Entrega',     NULL, 1, 0, 0, '0001-01-01', '00:00:00');
INSERT INTO `MIPSS_`.`0_Mdls` (`Rfrnc`, `Nm`, `Dscrptn`, `Mdl_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL,          'Psts', 'English: Posts              / Spanish: Publicaciones',       NULL, 1, 0, 0, '0001-01-01', '00:00:00');
# <.ENGLISH: MODULES. INSERT DATA / SPANISH: MÓDULOS. INSERTAR DATOS>