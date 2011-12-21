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

        // action body
        $vk = new vk_auth();

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
        //$message = 'Діду Морозу сподобалось це повідомлення.';

        // публикация сообщения на странице юзера контакта
        foreach ($this->view->messages as $message){
            if ($vk->post_to_user($message['message_sent_to'], $message['message'],false, $message['photo_id']))
            {
                echo 'Лєнич, ВОНО САМЕ ПОСТИТЬ!';
            }
            else
            {
                echo $vk->print_last_error();
                exit();
            }
        }

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

