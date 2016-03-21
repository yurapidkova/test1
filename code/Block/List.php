<?php
class Magetest_Yp_Block_List extends Mage_Core_Block_Template
{
    const ACTIVE_FLAG = 1;

    protected $collection = null;

    public function setCollection($collection) {
        $this->collection = $collection;
    }

    public function getCollection() {
        if(!$this->collection){
            $this->setCollection($this->getFaqList());
        }
        return $this->collection;
    }

    public function getQuestionUrl() {
        return Mage::getUrl('simplefaq/index/new');
    }

    public function getFaqList(){
        return Mage::getResourceModel('magetest_yp/simplefaq_collection')
            ->setOrder('update_time','DESC')
            ->addFieldToFilter('is_active', self::ACTIVE_FLAG);
    }
}