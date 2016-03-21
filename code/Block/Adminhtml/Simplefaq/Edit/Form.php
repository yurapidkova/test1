<?php
class Magetest_Yp_Block_Adminhtml_Simplefaq_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareLayout() {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    public function __construct()
    {
        parent::__construct();

        $this->setId('magetest_yp_simplefaq_form');
        $this->setTitle($this->__('Simple Faq Form'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('magetest_yp');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => $this->__('Simple Faq'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('question', 'text', array(
            'name'      => 'question',
            'label'     => $this->__('Question'),
            'title'     => $this->__('Question'),
            'required'  => true,
        ));

        $fieldset->addField('answer', 'editor', array(
            'name'      => 'answer',
            'label'     => $this->__('Answer'),
            'title'     => $this->__('Answer'),
            'required'  => true,
            'wysiwyg'   => true,
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
        ));

        $fieldset->addField('is_active', 'select', array(
            'name'      => 'is_active',
            'label'     => $this->__('is_active'),
            'title'     => $this->__('is_active'),
            'required'  => true,
            'options'   => array(
                '1' => $this->__('Enabled'),
                '0' => $this->__('Disabled'),
            ),
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}