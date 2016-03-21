<?php
class Magetest_Yp_Block_Adminhtml_Simplefaq_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('magetest_yp');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('magetest_yp/simplefaq')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('column_id',
            array(
                'header' => $this->__('Id'),
                'index' => 'id'
            )
        );
        $this->addColumn('question',
            array(
                'header' => $this->__('Question'),
                'index' => 'question'
            )
        );
        $this->addColumn('answer',
            array(
                'header' => $this->__('Answer'),
                'index' => 'answer'
            )
        );
        $this->addColumn('creation_time',
            array(
                'header' => $this->__('Creation Time'),
                'index' => 'creation_time'
            )
        );
        $this->addColumn('update_time',
            array(
                'header' => $this->__('Update Time'),
                'index' => 'update_time'
            )
        );
        $this->addColumn('is_active',
            array(
                'header' => $this->__('Is Active'),
                'index' => 'is_active'
            )
        );

        $this->addExportType('*/*/exportCsv', $this->__('CSV'));

        $this->addExportType('*/*/exportExcel', $this->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $modelPk = Mage::getModel('magetest_yp/simplefaq')->getResource()->getIdFieldName();
        $this->setMassactionIdField($modelPk);
        $this->getMassactionBlock()->setFormFieldName('ids');
        // $this->getMassactionBlock()->setUseSelectAll(false);
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }
}
