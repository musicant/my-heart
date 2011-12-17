<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $messages = new Application_Model_DbTable_Messages();
        $this->view->messages = $messages->getMessage();
    }
    public function updateAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $messages = new Application_Model_DbTable_Messages();
        $messages->updateMessage($id);
        
        echo $id.'true';die;
    }

}

