<?php

class Application_Model_DbTable_Send extends Zend_Db_Table_Abstract
{

    protected $_name = 'send';
    public function getMyvalentines($id){
        $select = $this->getAdapter()->select()
                    ->from(array('s'=>$this->_name))
                    ->joinLeft(array('i'=>'images'),'s.image_id = i.image_id')
                    ->where('s.send_from=?',$id)
                    ;
       
        return $select->query()->fetchAll();
    }
    public function updateSend($id,$date)
    {
        $data = array(
            'date_pay' => $date,
            'status' => 1,
        );
        $this->update($data, 'send_id = '. (int)$id);
    }
}