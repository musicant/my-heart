<?php

class Application_Model_DbTable_Images extends Zend_Db_Table_Abstract
{

    protected $_name = 'images';

    public function getImages($group = 1){
        $select = $this->getAdapter()->select()
                    ->from(array('i'=>$this->_name))
                    ->joinLeft(array('s'=>'send'),'s.image_id = i.image_id',"COUNT(s.image_id) as sent_count")
                    ->where('i.group_id=?',$group)
                    ->group('i.image_id')
                    ->order('order');

        return $select->query()->fetchAll();
    }
    public function getImage($id){
        $select = $this->getAdapter()->select()
                    ->from(array('i'=>$this->_name))

                    ->where('i.image_id=?',$id);

        return $select->query()->fetch();
    }
   
}

