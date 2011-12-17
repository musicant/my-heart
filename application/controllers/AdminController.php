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
       //echo 'asd';die;
       
        $this->view->messages = $messages->getMessage();
        // action body
    }


}

