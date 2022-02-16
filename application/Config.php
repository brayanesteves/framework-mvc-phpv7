<?php  
    /**
     * It is to include files from the 'views' side
     * 'User side'
     */
    define('BASE_URL', 'http://localhost/mvc-phpv7/');
    /**
     * This constant will mean the default controller of the application
     * In case no controller is sent in the URL, it will request the 'index' controller
     * And if we want to change a default value, we change the 'index' values
     */
    define('DEFAULT_CONTROLLER', 'index');

    /**
     * Is folder 'layout' directory 'views'
     */
    define('DEFAULT_LAYOUT', 'default');

    /**
     * ===========================
     * ===========================
     */
    define('APP_NAME', 'Halcón Bit');
    define('APP_SLOGAN', 'Наука — это весело, наслаждайся ею.');
    define('APP_COMPANY', 'Halcón Bit');

    /**
     *  ===========================
     * |          DATABASE         |
     *  ===========================
     */
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mipss_');
    define('DB_CHAR', 'utf8');
?>