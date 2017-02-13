<?php

class PAV_Insurances_Block_Adminhtml_Sales_Order extends Mage_Sales_Block_Order_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();

        $amt = $this->getSource()->getShippingInsurance();

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
