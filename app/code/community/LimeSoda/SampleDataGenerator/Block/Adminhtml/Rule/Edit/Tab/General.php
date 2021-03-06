<?php
class LimeSoda_SampleDataGenerator_Block_Adminhtml_Rule_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    protected function _prepareForm()
    {
        $helper = Mage::helper('ls_sampledatagenerator');
        $model  = Mage::registry('ls_sampledatagenerator_rule');
        $form   = new Varien_Data_Form();
        
        /* General */
        $fieldset = $form->addFieldset('rule_general',
           array('legend' => $helper->__('General Information'))
        );
        
        if ($model->getRuleId()) {
            $fieldset->addField('rule_id', 'hidden', array(
                'name' => 'rule_id',
            ));
        }
          
        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => $helper->__('Title'),
            'title'     => $helper->__('Title'),
            'required'  => true,
        ));
        
        /* Documentation */
        $fieldset = $form->addFieldset('rule_documentation',
           array('legend' => $helper->__('Documentation'))
        );
        
        $fieldset->addField('usage', 'note', array(
            'name'      => 'usage',
            'label'     => $helper->__('Usage'),
            'title'     => $helper->__('Usage'),
            'text'      => $helper->__('In the following tabs you can specify <strong>how many more</strong> websites, attributes, producte and so on should be created.<br /><br />The number of current entities is not considered.<br /><br />This means that if your store has 100 products and you enter 150 products, the extension will not create 50 more products but 150 new products (leading to a total of 250 products).'),
        ));
        
        $form->setValues($model->getData());
        $this->setForm($form);
          
        return parent::_prepareForm();
    }
    
    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }
    
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('ls_sampledatagenerator')->__('General Information');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('ls_sampledatagenerator')->__('General Information');
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }
}