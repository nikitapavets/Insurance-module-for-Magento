<?php

class PAV_Insurances_Block_Adminhtml_Sales_Creditmemo extends Mage_Sales_Block_Order_Creditmemo_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();

        $amt = $this->getOrder()->getShippingInsurance();

        if ($amt != 0) {
            $this->addTotal(
                new Varien_Object(
                    array(
                        'code' => 'insurance',
                        'value' => $amt,
                        'label' => 'Insurance',
                    )
                ),
                'insurance'
            );
        }

        return $this;
    }
}
