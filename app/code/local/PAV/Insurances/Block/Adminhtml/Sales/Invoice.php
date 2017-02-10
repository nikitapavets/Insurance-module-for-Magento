<?php
class PAV_Insurances_Block_Adminhtml_Sales_Invoice extends Mage_Sales_Block_Order_Invoice_Totals {

    protected function _initTotals() {
        parent::_initTotals();

        $amt = $this->getSource()->getInsurance();

        $amt = 25;

        if ($amt != 0) {
            $this->addTotal(new Varien_Object(array(
                'code' => 'insurance',
                'value' => $amt,
                'label' => 'Insurance',
            )), 'insurance');
        }
        return $this;
    }

}