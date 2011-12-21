<?
require('VkApi.class.php');

// настройки приложения
$api_id = 2711477;
$secret = 'ubNrwsizrFN5LJmWhAeD';

// создаем экземпляр класса запросов
$api = new VkApiNode($api_id, $secret);

//получаем строку запроса. Знімання бабла з юзера
$query_string = $api->withdrawVotes(5701489,100);

// создадим запрос через cURL
$ch = curl_init();
// адрес запроса
curl_setopt($ch, CURLOPT_URL, $query_string);
// возвращать ли результат запроса или вывести его на экран? true = return, false = print
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// выполняем запрос
curl_exec($ch);
curl_close($ch);
?>
