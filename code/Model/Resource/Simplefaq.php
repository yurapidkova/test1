<?php
class Magetest_Yp_Model_Resource_Simplefaq extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct() {
        $this->_init('magetest_yp/simple_faq','id');
    }

    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        if (!$object->getId()) {
            $object->setCreationTime(Mage::getSingleton('core/date')->gmtDate());
        }
        $object->setUpdateTime(Mage::getSingleton('core/date')->gmtDate());
        return parent::_beforeSave($object);
    }
}