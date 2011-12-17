<?php

class Application_Model_DbTable_Messages extends Zend_Db_Table_Abstract
{

    protected $_name = 'messages';
    public function getMessage()
    {
        $row = $this->fetchAll('status = 0');
        if (!$row) {
            throw new Exception("Count not find rows");
        }
        return $row->toArray();
    }


}

