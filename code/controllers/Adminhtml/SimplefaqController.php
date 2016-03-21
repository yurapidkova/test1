<?php

class Magetest_Yp_Adminhtml_SimplefaqController extends Mage_Adminhtml_Controller_Action
{

    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->loadLayout()
            ->_setActiveMenu('magetest_yp')
            ->_addBreadcrumb($this->__('Simple Faq'), $this->__('Simple Faq'))
            ->_addBreadcrumb($this->__('Question'), $this->__('Question'));
        return $this;
    }

    public function indexAction()
    {
//        $this->_title($this->__('Sales'))->_title($this->__('Orders Inchoo'));
        $this->loadLayout();
        $this->_setActiveMenu('magetest_yp');
        $this->_addContent($this->getLayout()->createBlock('magetest_yp/adminhtml_simplefaq'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('magetest_yp/adminhtml_simplefaq')->toHtml()
        );
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_initAction();

        $model = Mage::getModel('magetest_yp/simplefaq');
        if ($id = $this->getRequest()->getParam('id')) {
            $model->load($id);
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This Question no longer exists.'));
                $this->_redirect('*/*/');
            }
        }
        $this->_title($model->getId() ? mb_substr($model->getQuestion(), 0, 10) : $this->__('New Question'));

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }
        Mage::register('magetest_yp', $model);

        $this->_initAction()
            ->_addBreadcrumb(
                $id ? $this->__('Edit')
                    : $this->__('New'),
                $id ? $this->__('Edit')
                    : $this->__('New'))
            ->_addContent($this->getLayout()->createBlock('magetest_yp/adminhtml_simplefaq_edit'));

        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            //init model and set data
            $model = Mage::getModel('magetest_yp/simplefaq');

            if ($id = $this->getRequest()->getParam('id')) {
                $model->load($id);
            }

            $model->setData($data);

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__('The Question has been saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('page_id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;

            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addException($e, $this->__('An error occurred while saving the question.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            return;
        }
        $this->_redirect('*/*/');
    }

    public function exportCsvAction()
    {
        $fileName = 'simple_faq.csv';
        $grid = $this->getLayout()->createBlock('magetest_yp/simplefaq_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportExcelAction()
    {
        $fileName = 'simple_faq.xml';
        $grid = $this->getLayout()->createBlock('magetest_yp/simplefaq_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}