<?php
class Multidiscount_Couponcode_Model_Observer extends Mage_Core_Model_Abstract
{

    /**
     * Add an option which will be selected for further coupon process
     *
     * @param Varien_Event_Observer $observer
     */
    public function addOptionToDropdown($observer)
    {
        $field = $observer->getForm()->getElement('simple_action');
        $options = $field->getValues();
        $options[] = array(
            'value' => Multidiscount_Couponcode_Model_Percentconst::CART_PERCENT_ACTION,
            'label' => Mage::helper('couponcode')->__('Percent amount discount for whole cart')
        );
        $field->setValues($options);

        $fieldset = $observer->getForm()->addFieldset('cart_percentage', array('legend'=>Mage::helper('couponcode')->__('Cart percentage discount')));
        $percentField = $fieldset->addField('percentdiscount', 'text', array(
            'name'      => 'percentdiscount',
            'label'     => Mage::helper('couponcode')->__('Percent Discount'),
            'required'  => false,
        ));

        $percentField = $observer->getForm()->getElement('percentdiscount');

        $percentField->setRenderer(
            Mage::app()->getLayout()->createBlock('couponcode/adminhtml_promo_quote_edit_options')
        );
    }
}