<?php
class Magetest_Yp_Block_Adminhtml_Simplefaq extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct()
    {
        $this->_blockGroup      = 'magetest_yp';
        $this->_controller      = 'adminhtml_simplefaq';
        $this->_headerText      = $this->__('Simple Faq Grid');
        $this->_addButtonLabel  = $this->__('Add New Question');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }

}

