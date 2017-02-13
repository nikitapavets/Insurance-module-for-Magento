<?php

class PAV_Insurances_Model_QuoteAddressTotal extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    /**
     * @param Mage_Sales_Model_Quote_Address $address
     * @return self
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing') {
            return $this;
        }

        $grandTotal = $address->getGrandTotal();
        $baseGrandTotal = $address->getBaseGrandTotal();

        if (PAV_Insurances_Model_Insurance::getType() == PAV_Insurances_Model_Insurance::TYPE_ABSOLUTE) {
            $insuranceValue = PAV_Insurances_Model_Insurance::getAbsoluteValue();
            $address->setShippingInsurance($insuranceValue);
            $address->setBaseShippingInsurance($insuranceValue);
        } else {
            $totals = array_sum($address->getAllTotalAmounts());
            $baseTotals = array_sum($address->getAllBaseTotalAmounts());
            $insuranceValue = PAV_Insurances_Model_Insurance::getPersentValue();
            $address->setShippingInsurance($totals * $insuranceValue / 100);
            $address->setBaseShippingInsurance($baseTotals * $insuranceValue / 100);
        }

        $address->setGrandTotal($grandTotal + $address->getShippingInsurance());
        $address->setBaseGrandTotal($baseGrandTotal + $address->getBaseShippingInsurance());

        return $this;
    }

    /**
     * @param Mage_Sales_Model_Quote_Address $address
     * @return self|Mage_Sales_Model_Quote_Address
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing') {
            return $this;
        }

        $amt = $address->getShippingInsurance();

        if ($amt != 0) {
            $address->addTotal(
                array(
                    'code' => 'insurance',
                    'title' => 'Insurance',
                    'value' => $amt,
                )
            );
        }

        return $address;
    }
}
