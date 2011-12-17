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
        //END CONFIG
        //return parent::_initConfig();
        //$writer1 = new Zend_Log_Writer_Stream('/var/www/my-heart3/my-heart/log/log.log');
        //$logger = new Zend_Log();
        //$logger->addWriter($writer1);

    }

}

