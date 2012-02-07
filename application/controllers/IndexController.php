<?php

class IndexController extends Zend_Controller_Action
{
    //private $_price = 2;

    public function init()
    {
        
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //clear data in session
        $DataStorage = new Zend_Session_Namespace('dataStorage');
        $DataStorage->unsetAll();

        $this->_forward("images");
    }

    public function imagesAction()
    {
        $request = $this->getRequest();
         $VKParams = new Zend_Session_Namespace('testSpace');
        if (!isset($VKParams->requestParams) || empty($VKParams->requestParams['viewer_id']))
            $VKParams->requestParams = $request->getParams();
        
        $params = $request->getParams();
        session_start();
        if(isset($params['viewer_id'])){
            $currentUserId = $params['viewer_id'];
            $_SESSION['viewer_id'] =$currentUserId;
        }else{
            $currentUserId = $_SESSION['viewer_id'] ;
        }
        

        $group = $request->getParam('group',1);
        //get images list:
        $ImagesTable = new Application_Model_DbTable_Images();
        $images = $ImagesTable->getImages($group);
        $this->view->images = $images;
      

        $this->view->currentUserId = $currentUserId;

    }
    public function myvalentinesAction()
    {
        $request = $this->getRequest();
        $VKParams = new Zend_Session_Namespace('testSpace');
        if (!isset($VKParams->requestParams) || empty($VKParams->requestParams['viewer_id']))
            $VKParams->requestParams = $request->getParams();



        $currentUserId = $VKParams->requestParams['viewer_id'];


        $group = $request->getParam('group',1);
        //get send images list:
        $SendTable = new Application_Model_DbTable_Send();
        $images = $SendTable->getMyvalentines($currentUserId);

        $this->view->images = $images;
        $this->view->debugParams = $VKParams->requestParams;
    }
    /*public function friendsAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $VK = new Application_Model_VK();
        $currentUserId = $VKParams->requestParams['viewer_id'];

        $request = $this->getRequest();
        $imageId = $request->getParam('image_id');

        $this->view->imageId = $imageId;
        $this->view->currentUserId = $currentUserId;
        $this->view->friendsData = $VK->getFriendsList($currentUserId);
    }*/

    public function addressAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $DataStorage = new Zend_Session_Namespace('dataStorage');
        $currentUserId = $VKParams->requestParams['viewer_id'];

        $request = $this->getRequest();
        $imageId = $request->getParam('image_id');

        $params = $request->getParams();
        if (!empty($params['first_name'])){
            $addressParams = $params;
            $DataStorage->addressParams = $addressParams;
            $this->_forward('message');
        } else {
            $addressParams = $DataStorage->addressParams;
        }

        if (!empty($imageId)){
            $DataStorage->imageId = $imageId;
            $ImagesTable = new Application_Model_DbTable_Images();
            $image = $ImagesTable->getImage($imageId);
            $DataStorage->price = $image['price'];
        } else {
            $imageId = $DataStorage->imageId;
        }


        $this->view->imageId = $imageId;
        $this->view->currentUserId = $currentUserId;
        $this->view->addressParams = $addressParams;
    }

    public function messageAction()
    {
        $DataStorage = new Zend_Session_Namespace('dataStorage');
        $request = $this->getRequest();
        $message = $request->getParam('message');
        $author = $request->getParam('author');
        if (!empty($message)){
            $DataStorage->message = $message;
            $DataStorage->author = $author;
            $this->_forward("color");
        } else {
            $message = $DataStorage->message;
        }

        $this->view->message = $message;
    }

    public function colorAction()
    {
        $DataStorage = new Zend_Session_Namespace('dataStorage');
        $request = $this->getRequest();
        $color = $request->getParam('color');
        if (!empty($color)){
            $DataStorage->color = $color;
            $this->_forward("congratulation");
        } else {
            $color = $DataStorage->color;
        }

        $this->view->color = $color;
    }

    public function payAction()
    {
        $this->view->price = $this->_price;
    }
    public function datepayAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('send_image_id');
        $date = $request->getParam('date');
        $SendTable = new Application_Model_DbTable_Send();
        $SendTable->updateSend($id,$date);
        $this->_forward('myvalentines');

    }
    public function aboutAction()
    {
        $this->view->price = $this->_price;
    }

    /*public function postCardAction()
    {
        // action body
        $VKParams = new Zend_Session_Namespace('testSpace');
        $currentUserId = $VKParams->requestParams['viewer_id'];

        $ImagesTable = new Application_Model_DbTable_Images();
        $images = $ImagesTable->fetchAll()->toArray();

        $request = $this->getRequest();
        $myFriendId = $request->getParam('friend');

        $this->view->images = $images;
        $this->view->myFriendId = $myFriendId;
        $this->view->currentUserId = $currentUserId;
    }*/

    public function congratulationAction(){
        $request = $this->getRequest();

        $DataStorage = new Zend_Session_Namespace('dataStorage');

        $VKParams = new Zend_Session_Namespace('testSpace');
        $currentUserId = $VKParams->requestParams['viewer_id'];

        $VK = new Application_Model_VK();

        $sendArray = array();
        $sendArray['message_text'] = $DataStorage->message;
        $sendArray['created_date'] = gmdate("Y-m-d H:i:s");
        $sendArray['image_id'] = $DataStorage->imageId;
        $sendArray['address_first_name'] = $DataStorage->addressParams['first_name'];
        $sendArray['address_last_name'] = $DataStorage->addressParams['last_name'];
        $sendArray['address_father_name'] = $DataStorage->addressParams['father_name'];
        $sendArray['address_country'] = ''.$DataStorage->addressParams['country'];
        $sendArray['address_state'] = ''.$DataStorage->addressParams['state'];
        $sendArray['address_city'] = $DataStorage->addressParams['city'];
        $sendArray['address_street'] = $DataStorage->addressParams['street'];
        $sendArray['address_house'] = $DataStorage->addressParams['house'];
        $sendArray['address_room'] = $DataStorage->addressParams['room'];
        $sendArray['address_zip'] = $DataStorage->addressParams['zip'];
        $sendArray['contact_phone'] = ''.$DataStorage->addressParams['phone'];
        $sendArray['send_from'] = ''.$currentUserId;
        $sendArray['author'] = ''.$DataStorage->author;
        $sendArray['color'] = $DataStorage->color;
        $sendArray['price'] = $DataStorage->price;

        $SendTable = new Application_Model_DbTable_Send();
        try {
            $id = $SendTable->insert($sendArray);
            if (!empty($this->_price)){
                $VK->getMoneyFromUser($currentUserId,$this->_price);
                $DataStorage->unsetAll();
            }
        } catch (Zend_Exception $e){
            print_r($e->getMessage());
            die();

        }
        $to      = 'tepalenko@gmail.com';
        $subject = 'Valentine';

        $headers = 'From: webmaster@example.com' . "\r\n" .
                   'Reply-To: webmaster@example.com' . "\r\n" .
                   'X-Mailer: PHP/';


	 mail($to, $subject, 'Заказ принят', $headers);
         $this->view->price = $DataStorage->price;

    }

}

