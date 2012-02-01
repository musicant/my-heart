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
/*
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
                echo $message['id']." Posted<br/>";
                $id = $message['id'];
                $messages = new Application_Model_DbTable_Messages();
                $messages->updateMessage($id);
            }
            else
            {
                echo $vk->print_last_error();
                exit();
            }
        }
        die();*/

    }
    public function updateAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $messages = new Application_Model_DbTable_Messages();
        $messages->updateMessage($id);
        
        echo $id.'true';die;
    }

    public function parserAction(){
        $VK = new Application_Model_VK();
        $ImagesTable = new Application_Model_DbTable_Images();

        $imgPath = APPLICATION_PATH."/../public/img/";

        $photos = $VK->getPhotos();
        foreach ($photos->response as $photo){

            $file_path = $imgPath.basename($photo->src_small,"?");
            if (!file_exists($file_path))
                file_put_contents($file_path,file_get_contents($photo->src_small));

            $row = $ImagesTable->fetchRow($ImagesTable->select()->where('photo_id=?',SANTA_ID."_".$photo->pid));
            if (!empty($row['image_id'])){
                $imageArray = array();
                $imageArray['src'] = $photo->src_small;
                $ImagesTable->update($imageArray,'image_id='.$row['image_id']);
            } else {
                $imageArray = array();
                $imageArray['photo_id'] = SANTA_ID."_".$photo->pid;
                $imageArray['src'] = $photo->src_big;
                $ImagesTable->insert($imageArray);
            }
        }
        die();
    }

    public function testAction(){
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VK = new Application_Model_VK();
        $currentUserId = $VKParams->requestParams['user_id'];

        $votes = $VK->getUserVotes($currentUserId);
        echo $votes;
        die();
    }

}

