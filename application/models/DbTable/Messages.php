<?php

class Application_Model_DbTable_Messages extends Zend_Db_Table_Abstract
{

    protected $_name = 'messages';
    public function getMessage()
    {
        $select  = $this->getAdapter()->select()
                ->from(array('m'=>$this->_name))
                ->joinInner(array('i'=>'images'),'i.image_id=m.image_id',array('photo_id'))
                ->where('status = ?',0);

        $row = $select->query()->fetchAll();

//        $row = $this->fetchAll('status = 0');
        if (!$row) {
            throw new Exception("Count not find rows");
        }
        return $row;
    }
    public function updateMessage($id)
    {
        $data = array(
            'status' => 1,
        );
        $this->update($data, 'id = '. (int)$id);
    }

}

