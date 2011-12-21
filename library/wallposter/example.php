<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
@ini_set('memory_limit', '16M');
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('set_time_limit',0);
header('Content-Type: text/html; charset=utf-8'); 
@ob_end_flush();


define('SCR_DIR', dirname(__FILE__));

include_once(SCR_DIR . '/config.php');
include_once(SCR_DIR . '/classes/minicurl.class.php');
include_once(SCR_DIR . '/classes/vk_poster.class.php');

$vk = new vk_auth();

// авторизация на сайте
if($vk->check_auth())
{
	echo 'Authorised in vk!<br>';	
}
else
{
	echo $vk->print_last_error();
	exit();
}

// сообщение для публикации (обязательно в UTF-8)
$message = 'Простое сообщение';

// публикация сообщения на странице юзера контакта
if ($vk->post_to_user(5701489, $message))
{
	echo 'Posted in user page!';
}
else
{
	echo $vk->print_last_error();
	exit();
}

?>
