<?php

class PAV_Insurances_Model_OrderCreditmemoTotal extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getOrder()->getShippingInsurance());
        $creditmemo->setBaseGrandTotal(
            $creditmemo->getBaseGrandTotal() + $creditmemo->getOrder()->getBaseShippingInsurance()
        );

        return $this;
    }
}
