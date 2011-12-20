<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $request = $this->getRequest();
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VKParams->requestParams = $request->getParams();
    }

    public function friendsAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VK = new Application_Model_VK();
        $currentUserId = $VKParams->requestParams['user_id'];

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
        $messageData['message_sent_to'] = $request->getParam('friend-id');
        $messageData['photo_id'] = $request->getParam('post-card');
        $messageData['message'] = 'test message';
        $MessagesTable->insert($messageData);
        die('congratulation!');
    }

}

