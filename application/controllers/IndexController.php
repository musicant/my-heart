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

        $request = $this->getRequest();
        $myFriendId = $request->getParam('my-friend');
        $this->view->myFriendId = $myFriendId;
        $this->view->currentUserId = $currentUserId;
    }

}

