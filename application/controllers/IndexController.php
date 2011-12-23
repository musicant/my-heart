<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VKParams->requestParams = $request->getParams();


        $VKParams = new Zend_Session_Namespace('testSpace');
        $VK = new Application_Model_VK();
        $currentUserId = $VKParams->requestParams['user_id'];

        $votes = $VK->getUserVotes($currentUserId);

        //get images list:
        $ImagesTable = new Application_Model_DbTable_Images();
        $images = $ImagesTable->getImages();
        $this->view->images = $images;
    }

    public function friendsAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VK = new Application_Model_VK();
        $currentUserId = $VKParams->requestParams['user_id'];

        $request = $this->getRequest();
        $imageId = $request->getParam('image_id');

        $this->view->imageId = $imageId;
        $this->view->currentUserId = $currentUserId;
        $this->view->friendsData = $VK->getFriendsList($currentUserId);
    }


    public function postCardAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $currentUserId = $VKParams->requestParams['user_id'];

        $ImagesTable = new Application_Model_DbTable_Images();
        $images = $ImagesTable->fetchAll()->toArray();

        $request = $this->getRequest();
        $myFriendId = $request->getParam('friend');

        $this->view->images = $images;
        $this->view->myFriendId = $myFriendId;
        $this->view->currentUserId = $currentUserId;
    }

    public function congratulationAction(){
        $request = $this->getRequest();
        $MessagesTable = new Application_Model_DbTable_Messages();

        $VKParams = new Zend_Session_Namespace('testSpace');
        $currentUserId = $VKParams->requestParams['user_id'];


        $messageData = array();
        $messageData['message_sent_from'] = $currentUserId;
        $messageData['message_sent_to'] = $request->getParam('friend');
        $messageData['image_id'] = $request->getParam('image_id');
        $messageData['message'] = 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489';
        $MessagesTable->insert($messageData);
    }

}

