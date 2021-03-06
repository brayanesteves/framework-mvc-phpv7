# <ACCIONES: INSERTAR DATOS> 
INSERT INTO `MIPSS_`.`0_Usrs` (`Rfrnc`, `Usrnm`, `Psswrd`, `Rfrnc_Prsn`, `UsrTyp_Rfrnc`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, "admin", "d1b254c9620425f582e27f0044be34bee087d8b4", 1, 1, 0, 0, 0, "0001-01-01", "00:00:00");

# <00000 - MÓDULO: USUARIOS (USRS)[CRUD]>
INSERT INTO `MIPSS_`.`0_TypsUsrs` (`Rfrnc`, `Nm`, `Dscrptn`, `Lvl`, `Cndtn`, `Rmvd`,`Lckd`, `DtAdmssn`, `ChckTm`) VALUES ('00000', 'Mngr', 'English: Manager / Spanish: Administrador', 0, 1, 0, 0, "0001-01-01", "00:00:00");
# </ACCIONES: INSERTAR DATOS>

# <ACCIONES: INSERTAR DATOS>
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 1, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 2, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 3, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_OprtnUsrTypActns` (`Rfrnc`, `Rfrnc_TypUsr`, `Rfrnc_Actn`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, 4, 1, 0, 0, "0001-01-01", "00:00:00");
# </ACCIONES: INSERTAR DATOS>

INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL,      "Post",   "Post information",         "post", "", 1, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL,     "About",         "About page",        "about", "", 0, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL, "Encrypted", "Encrypted password",      "encrypt", "", 1, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL,     "Login",         "Login user",        "login", "", 0, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL,  "Register",      "Register user",       "signin", "", 0, 1, 0, 0, "0001-01-01", "00:00:00");
INSERT INTO `MIPSS_`.`0_Mn` (`Rfrnc`, `Rfrnc_Usr`, `Rfrnc_Mn`, `Nm`, `Dscrptn`, `Lnk`, `Img`, `Athntcd`, `Cndtn`, `Rmvd`, `Lckd`, `DtAdmssn`, `ChckTm`) VALUES (NULL, 1, NULL,    "Logout",        "Logout user", "login/logout", "", 1, 1, 0, 0, "0001-01-01", "00:00:00");