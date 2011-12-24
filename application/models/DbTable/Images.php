<?php

class Application_Model_DbTable_Images extends Zend_Db_Table_Abstract
{

    protected $_name = 'images';

    public function getImages(){
        $select = $this->getAdapter()->select()
                    ->from(array('i'=>$this->_name),'i.*, COUNT(m.image_id) as sent_count')
                    ->joinLeft(array('m'=>'messages'),'m.image_id = i.image_id',array())
                    ->group('i.image_id')
                    ->limit()
        ;
        
        return $select->query()->fetchAll();
    }

}

