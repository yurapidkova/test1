<?php
class Magetest_Yp_Block_New extends Mage_Core_Block_Template
{
    public function getSaveUrl(){
        return Mage::getUrl('simplefaq/index/save');
    }
}