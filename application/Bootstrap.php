<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initMyFirstInit()
    {
        // VK API CONFIG
        global $VK_Config,$logger;
        $VK_Config = array();
        $VK_Config['api_id'] = "2711477";
        $VK_Config['api_secret'] = "ubNrwsizrFN5LJmWhAeD";
        $VK_Config['api_url'] = "http://api.vkontakte.ru/api.php";

        define("SANTA_ID",'5701489');
        define("SANTA_ALBUM_ID",'145745462');


        //configuration for "wallposter"
        define('VKEMAIL', 'djas-best@mail.ru');				// vk email/login
        define('VKPWD', 'AwdarkIbUd');			// vk password
        define('VKPHONE', '2321');				// FOURTH (4!!!) LAST digits from phone

        // Other config
        define('SLEEPTIME', 2);					// in seconds; +rand(1, 4) if this var != 0
        define('DEBUG', FALSE);					// debug pages

        // Files config
        define('COOKIES_FILE', APPLICATION_PATH.'/../logs/cookies.txt');		// cookies
        define('LOG_FILE', APPLICATION_PATH.'/../logs/logfile.txt');			// log
        //END CONFIG

        require_once 'wallposter/classes/minicurl.class.php';
        require_once 'wallposter/classes/vk_poster.class.php';

        
        $writer = new Zend_Log_Writer_Stream(APPLICATION_PATH.'/../logs/zend.'.date("Y-m-d").'.log');
        $logger = new Zend_Log();
        $logger->addWriter($writer);
    }

}

