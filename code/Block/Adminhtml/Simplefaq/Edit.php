<?php
class Magetest_Yp_Block_Adminhtml_Simplefaq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'magetest_yp';
        $this->_controller = 'adminhtml_simplefaq';

        parent::__construct();
    }

    public function getHeaderText()
    {
        if (Mage::registry('magetest_yp')->getId()) {
            return $this->__('Edit Question');
        } else {
            return $this->__('New Question');
        }
    }
}