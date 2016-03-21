<?php
class Magetest_Yp_Model_Resource_Simplefaq_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        $this->_init('magetest_yp/simplefaq');
    }
}