<?php
class Magetest_Yp_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction() {
        if($question = $this->getRequest()->getPost('question')) {
            $model = Mage::getModel('magetest_yp/simplefaq');
            $model->setQuestion($question);
            try {
                $model->save();
                Mage::getSingleton('core/session')->addSuccess($this->__('Question Successful Added'));
            } catch(Exception $e) {
                Mage::getSingleton('core/session')->addError($this->__('Sorry But Something Going Wrong'));
            }
        } else {
            Mage::getSingleton('core/session')->addError($this->__('Incorrect Or Empty Data'));
        }
        $this->_redirect('*/*/new');
    }
}