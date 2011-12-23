<?php

class Application_Model_VK
{
    //$VK_Config - you can found this configs

    //generate signature
    public function generateSecretString($paramArray){
        global $VK_Config;

        ksort($paramArray);
        $result = '';
        foreach ($paramArray as $key=>$param){
            $result .= "$key=$param";
        }

        $result.=$VK_Config['api_secret'];
        return $result;
    }

    //generate request str
    public function generateOpenString($method,$additionlaParams){
        global $VK_Config;

        //set API method
        $paramArray['method'] = $method;
        $paramArray['api_id'] = $VK_Config['api_id'];

        $paramArray['random'] = rand(10000,99999);
        $paramArray['v'] = "3.0";
        //$paramArray['timestamp'] = date();

        //copy additional params to main array
        $paramArray = $paramArray + $additionlaParams;

        //generate signature string
        $sigStr = $this->generateSecretString($paramArray);
        $result = '';
        //add signature sting to main array
        $paramArray['sig'] = md5($sigStr);
        //make request srting
        foreach ($paramArray as $key=>$param){
            if ($result=='')
                $result .= "?$key=$param";
            else
                $result .= "&$key=$param";
        }

        return $result;
    }

    //make request to VK API
    public static function makeVKRequest($method,$params){
        global $VK_Config;
        $VK = new Application_Model_VK();
        $requestStr = $VK->generateOpenString($method,$params);
        return file_get_contents($VK_Config['api_url'].$requestStr);
    }

    public function getFriendsList($currentUserId){
        $friendIdsJSON = Application_Model_VK::makeVKRequest("friends.get",array('uid'=>$currentUserId, 'format'=>'json'));
        $FriendIds = json_decode($friendIdsJSON);
        $friendsDataJSON = Application_Model_VK::makeVKRequest("getProfiles",array('uids'=>implode(',',$FriendIds->response),'fields'=>"uid,first_name,last_name,photo", 'format'=>'json'));
        $FriendsData = json_decode($friendsDataJSON);
        return $FriendsData;
    }

    //TODO: we use this method for button in admin panel
    public function getPhotos(){
        $userId = SANTA_ID;
        $albumId = SANTA_ALBUM_ID;
        $photosJSON = Application_Model_VK::makeVKRequest("photos.get",array('uid'=>$userId, 'aid'=>$albumId, 'format'=>'json'));
        return json_decode($photosJSON);
    }

    public function getUserVotes($userId){
        global $VK_Config;
        // настройки приложения
        $api_id = $VK_Config['api_id'];//2711477;
        $secret = $VK_Config['api_secret'];//'ubNrwsizrFN5LJmWhAeD';

        // создаем экземпляр класса запросов
        $api = new VkApiNode($api_id, $secret);

        //получаем строку запроса. Знімання бабла з юзера
        $query_string = $api->getBalance($userId);

        // создадим запрос через cURL
        $ch = curl_init();
        // адрес запроса
        curl_setopt($ch, CURLOPT_URL, $query_string);
        // возвращать ли результат запроса или вывести его на экран? true = return, false = print
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // выполняем запрос
        $votes = curl_exec($ch);
        curl_close($ch);
        return $votes;
    }

}

