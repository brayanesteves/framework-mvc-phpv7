# <ENGLISH: USERS / SPANISH: USUARIOS>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_Usrs` (
    `Rfrnc`        INT(255)     NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc        (English: Reference                          / Spanish: Referencia)',
    `Usrnm`        VARCHAR(20)  NOT NULL                COMMENT 'Usrnm        (English: Username                           / Spanish: Nombre de Usuario)',
    `Psswrd`       VARCHAR(255) NOT NULL                COMMENT 'Psswrd       (English: Password                           / Spanish: Contraseña)',
    `Rfrnc_Prsn`   INT    (255) NOT NULL                COMMENT 'Rfrnc_Prsn   (English: Reference. Person                  / Spanish: Referencia. Persona)',
    `UsrTyp_Rfrnc` INT    (255) NOT NULL                COMMENT 'UsrTyp_Rfrnc (English: User Type. Reference               / Spanish: Referencia. Tipo de Usuario)',
    `Cndtn`        INT    (2)   NOT NULL                COMMENT 'Cndtn        (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`         INT    (2)   NOT NULL                COMMENT 'Rmvd         (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`         INT    (2)   NOT NULL                COMMENT 'Lckd         (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`     DATE             NULL                COMMENT 'DtAdmssn     (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`       TIME             NULL                COMMENT 'ChckTm       (English: Check In Time                      / Spanish: Hora de Ingreso)',
    PRIMARY KEY (`Rfrnc`),
    CONSTRAINT `FrgnKy_Prsn` FOREIGN KEY(`Rfrnc_Prsn`) REFERENCES `MIPSS_`.`0_Prsn`(`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Usrs (English: 0 - Users / Spanish: 0 - Usuarios)';


CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_UsrsEmls` (
    `Rfrnc`        INT(255)     NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc        (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_Usrs`   INT(255)     NOT NULL                COMMENT 'Rfrnc_Usrs   (English: Reference. Users                   / Spanish: Referencia. Usuarios)',
    `Eml`          VARCHAR(60)  NOT NULL                COMMENT 'Emls         (English: Emails                             / Spanish: Correo Electrónico)',    
    `Cndtn`        INT    (2)   NOT NULL                COMMENT 'Cndtn        (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`         INT    (2)   NOT NULL                COMMENT 'Rmvd         (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`         INT    (2)   NOT NULL                COMMENT 'Lckd         (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`     DATE             NULL                COMMENT 'DtAdmssn     (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`       TIME             NULL                COMMENT 'ChckTm       (English: Check In Time                      / Spanish: Hora de Ingreso)',
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_UsrsEmls (English: 0 - Users Emails / Spanish: 0 - Correos Electrónicos de Usuarios)';

CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_IntrntPrtcl` (
    `Rfrnc`        INT(255)     NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc        (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_Usrs`   INT(255)     NOT NULL                COMMENT 'Rfrnc_Usrs   (English: Reference. Users                   / Spanish: Referencia. Usuarios)',
    `Pblc_V4`      VARCHAR(15)      NULL                COMMENT 'Pblc_V4      (English: Public V4                          / Spanish: Pública V4)',    
    `Pblc_V6`      VARCHAR(60)      NULL                COMMENT 'Pblc_V6      (English: Public V6                          / Spanish: Pública V6)',    
    `Prvt_V4`      VARCHAR(15)      NULL                COMMENT 'Prvt_V4      (English: Private V4                         / Spanish: Privada V4)',    
    `Prvt_V6`      VARCHAR(60)      NULL                COMMENT 'Prvt_V6      (English: Private V6                         / Spanish: Privada V6)',    
    `Cndtn`        INT    (2)   NOT NULL                COMMENT 'Cndtn        (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`         INT    (2)   NOT NULL                COMMENT 'Rmvd         (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`         INT    (2)   NOT NULL                COMMENT 'Lckd         (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`     DATE             NULL                COMMENT 'DtAdmssn     (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`       TIME             NULL                COMMENT 'ChckTm       (English: Check In Time                      / Spanish: Hora de Ingreso)',
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_IntrntPrtcl (English: 0 - Internet Protocol / Spanish: 0 - Protocolo de Internet)';

CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_UsrEmlActvtn` (
    `Rfrnc`           INT(255)     NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc           (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_Usrs`      INT(255)     NOT NULL                COMMENT 'Rfrnc_Usrs      (English: Reference. Users                   / Spanish: Referencia. Usuarios)',
    `ActvtnCd_Rndm`   VARCHAR(60)      NULL                COMMENT 'ActvtnCd_Rndm   (English: Activation Code. Random            / Spanish: Código de Activación. Aleatorio)', 
    `ActvtnCd_MD5`    VARCHAR(256)     NULL                COMMENT 'ActvtnCd_MD5    (English: Activation Code. MD5               / Spanish: Código de Activación. MD5)',     
    `ActvtnCd_SHA256` VARCHAR(256)     NULL                COMMENT 'ActvtnCd_SHA256 (English: Activation Code. SHA256            / Spanish: Código de Activación. SHA256)',         
    `Cndtn`           INT    (2)   NOT NULL                COMMENT 'Cndtn           (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`            INT    (2)   NOT NULL                COMMENT 'Rmvd            (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`            INT    (2)   NOT NULL                COMMENT 'Lckd            (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`        DATE             NULL                COMMENT 'DtAdmssn        (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`          TIME             NULL                COMMENT 'ChckTm          (English: Check In Time                      / Spanish: Hora de Ingreso)',
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_UsrEmlActvtn (English: 0 - User Email Activation / Spanish: 0 - Activación de Correo Electrónico del Usuario)';
# <0 - USUARIOS: INSERTAR DATOS>

# <.ENGLISH: USERS / SPANISH: USUARIOS>

# <ENGLISH: TYPES OF USERS / SPANISH: TIPOS DE USUARIOS>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_TypsUsrs` (
    `Rfrnc`    INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc    (English: Reference                          / Spanish: Referencia)',
    `Nm`       VARCHAR(20)  NOT NULL                COMMENT 'Nm       (English: Name                               / Spanish: Nombre)',
    `Dscrptn`  TEXT         NOT NULL                COMMENT 'Dscrptn  (English: Description                        / Spanish: Descripción)',
    `Lvl`      INT    (20)  NOT NULL                COMMENT 'Lvl      (English: Level                              / Spanish: Nivel)',
    `Cndtn`    INT    (2)   NOT NULL                COMMENT 'Cndtn    (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`     INT    (2)   NOT NULL                COMMENT 'Rmvd     (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`     INT    (2)   NOT NULL                COMMENT 'Lckd     (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn` DATE             NULL                COMMENT 'DtAdmssn (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`   TIME             NULL                COMMENT 'ChckTm   (English: Check In Time                      / Spanish: Hora de Ingreso)', 
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_TpsUsrs (English: 0 - Types of Users / Spanish: 0 - Tipos de Usuarios)';

# <.ENGLISH: TYPES OF USERS / SPANISH: TIPOS DE USUARIOS>

# <ENGLISH: OPERATION. USER TYPE ACTIONS / SPANISH: OPERACIÓN. ACCIONES DE TIPOS DE USUARIOS>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_OprtnUsrTypActns` (
    `Rfrnc`        INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc        (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_TypUsr` INT    (255) NOT NULL                COMMENT 'Rfrnc_TypUsr (English: Reference. Type of User            / Spanish: Referencia. Tipo de Usuario)',
    `Rfrnc_Actn`   INT    (255) NOT NULL                COMMENT 'Rfrnc_Atcn   (English: Reference. Action                  / Spanish: Referencia. Acción)',    
    `Cndtn`        INT    (2)   NOT NULL                COMMENT 'Cndtn        (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`         INT    (2)   NOT NULL                COMMENT 'Rmvd         (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`         INT    (2)   NOT NULL                COMMENT 'Lckd         (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`     DATE             NULL                COMMENT 'DtAdmssn     (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`       TIME             NULL                COMMENT 'ChckTm       (English: Check In Time                      / Spanish: Hora de Ingreso)',
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_OprtnUsrTypActns (English: Operation. User Type Actions / Spanish: 0 - Operación. Acciones: Tipos de Usuarios)';

# <.ENGLISH: OPERATION. USER TYPE ACTIONS / SPANISH: OPERACIÓN. ACCIONES DE TIPOS DE USUARIOS>

# <ENGLISH: ACTIONS / SPANISH: ACCIONES>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_Actns` (
    `Rfrnc`      INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc        (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_Lnk`  INT    (255)     NULL                COMMENT 'Rfrnc_Lnk    (English: Reference Link                     / Spanish: Referencia. Enlace)',
    `Nm`         VARCHAR(20)  NOT NULL                COMMENT 'Nm           (English: Name                               / Spanish: Nombre)',
    `Dscrptn`    TEXT         NOT NULL                COMMENT 'Dscrptn      (English: Description                        / Spanish: Descripción)',
    `Rfrnc_Actn` INT    (255)     NULL                COMMENT 'Rfrnc_Actn   (English: Reference. Action                  / Spanish: Referencia. Acción)',
    `Mdl_Rfrnc`  INT    (255) NOT NULL                COMMENT 'Mdl_Rfrnc    (English: Module. Reference                  / English: Referencia. Módulo)',    
    `Cndtn`      INT    (2)   NOT NULL                COMMENT 'Cndtn        (English: Condition [0: Inactive, 1: Active] / Spanish: Estado [0: Inactivo, 1: Activo])',
    `Rmvd`       INT    (2)   NOT NULL                COMMENT 'Rmvd         (English: Removed [0: Inactive, 1: Active]   / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`       INT    (2)   NOT NULL                COMMENT 'Lckd         (English: Locked [0: Inactive, 1: Active]    / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`   DATE             NULL                COMMENT 'DtAdmssn     (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`     TIME             NULL                COMMENT 'ChckTm       (English: Check In Time                      / Spanish: Hora de Ingreso)', 
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Actns (English: 0 - Actions / Spanish: 0 - Acciones)';

# <ENGLISH: POSTS / SPANISH: PUBLICACIONES>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_Psts` (
    `Rfrnc`         INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc         (English: Reference                          / Spanish: Referencia)',
    `Rfrnc_Usr`     INT    (255) NOT NULL                COMMENT 'Rfrnc_Prsn    (English: Reference. User                    / Spanish: Referencia. Usuario)',
    `Ttl`           VARCHAR(90)  NOT NULL                COMMENT 'Ttl           (English: Title                              / Spanish: Título)',
    `Bdy`           TEXT         NOT NULL                COMMENT 'Bdy           (English: Body                               / Spanish: Cuerpo)',
    `Cndtn`         INT    (2)   NOT NULL                COMMENT 'Cndtn         (English: Condition [0: Inactive, 1: Active] / Spanish: Estado    [0: Inactivo, 1: Activo])',
    `Rmvd`          INT    (2)   NOT NULL                COMMENT 'Rmvd          (English: Removed   [0: Inactive, 1: Active] / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`          INT    (2)   NOT NULL                COMMENT 'Lckd          (English: Locked    [0: Inactive, 1: Active] / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`      DATE             NULL                COMMENT 'DtAdmssn      (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
    `ChckTm`        TIME             NULL                COMMENT 'ChckTm        (English: Check In Time                      / Spanish: Hora de Ingreso)', 
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Psts (English: 0 - Posts / Spanish: 0 - Publicaciones)';
# <.ENGLISH: POSTS / SPANISH: PUBLICACIONES>

# <ENGLISH: MENU / SPANISH: MENÚ>
CREATE TABLE IF NOT EXISTS `MIPSS_`.`0_Mn` (
    `Rfrnc`         INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc         (English: Reference                              / Spanish: Referencia)',
    `Rfrnc_Usr`     INT    (255) NOT NULL                COMMENT 'Rfrnc_Prsn    (English: Reference. User                        / Spanish: Referencia. Usuario)',
    `Rfrnc_Mn`      INT    (255)     NULL                COMMENT 'Rfrnc_Mn      (English: Reference. Menu                        / Spanish: Referencia. Menú)',
    `Nm`            VARCHAR(255) NOT NULL                COMMENT 'Nm            (English: Name                                   / Spanish: Nombre)',
    `Dscrptn`       TEXT         NOT NULL                COMMENT 'Dscrptn       (English: Description                            / Spanish: Descripción)',
    `Lnk`           TEXT         NOT NULL                COMMENT 'Lnk           (English: Link                                   / Spanish: Enlaces)',
    `Img`           TEXT             NULL                COMMENT 'Ttl           (English: Title                                  / Spanish: Título)',
    `Athntcd`       INT    (2)   NOT NULL                COMMENT 'Athntcd       (English: Authenticated [0: Inactive, 1: Active] / Spanish: Autenticado    [0: Inactivo, 1: Activo])',
    `Cndtn`         INT    (2)   NOT NULL                COMMENT 'Cndtn         (English: Condition [0: Inactive, 1: Active]     / Spanish: Estado    [0: Inactivo, 1: Activo])',
    `Rmvd`          INT    (2)   NOT NULL                COMMENT 'Rmvd          (English: Removed   [0: Inactive, 1: Active]     / Spanish: Eliminado [0: Inactivo, 1: Activo])',
    `Lckd`          INT    (2)   NOT NULL                COMMENT 'Lckd          (English: Locked    [0: Inactive, 1: Active]     / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
    `DtAdmssn`      DATE             NULL                COMMENT 'DtAdmssn      (English: Date of Admission                      / Spanish: Fecha de Ingreso)',
    `ChckTm`        TIME             NULL                COMMENT 'ChckTm        (English: Check In Time                          / Spanish: Hora de Ingreso)', 
    PRIMARY KEY (`Rfrnc`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Mn (English: 0 - Menu / Spanish: 0 - Menú)';
# <.ENGLISH: MENÚ / SPANISH: MENÚ>