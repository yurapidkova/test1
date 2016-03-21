<?php
class Magetest_Yp_Block_Widget extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface {


    protected function _toHtml() {
        /**
         * @var $collection Magetest_Yp_Model_Resource_Simplefaq_Collection
         */
        $ids = explode(',',$this->getData('list'));

        if(empty($ids)) {
            return '';
        }

        $block = $this->getLayout()->createBlock('magetest_yp/list')->setTemplate('magetest/list.phtml');
        $collection = $block->getCollection();
        $collection->addFieldToFilter('id', array('in'=>$ids));
        $block->setCollection($collection);

        return $block->toHtml();
    }

}