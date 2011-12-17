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
        $friendIdsJSON = Application_Model_VK::makeVKRequest("friends.get",array('uid'=>$currentUserId,'count'=>10, 'format'=>'json'));
        $FriendIds = json_decode($friendIdsJSON);
        $friendsDataJSON = Application_Model_VK::makeVKRequest("getProfiles",array('uids'=>implode(',',$FriendIds->response),'fields'=>"uid,first_name,last_name,photo", 'format'=>'json'));
        $FriendsData = json_decode($friendsDataJSON);
        return $FriendsData;
    }

    //TODO: we use this method for button in admin panel
    public function getPhotos(){
        $userId = '5701489';
        $albumId = '145745462';
        $photosJSON = Application_Model_VK::makeVKRequest("photos.get",array('uid'=>$userId, 'aid'=>$albumId, 'format'=>'json'));
        return json_decode($photosJSON);
    }

}

