<?php

class PAV_Insurances_Model_Invoice extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $invoice->setGrandTotal(100);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getBaseFeeAmount());

        return $this;
    }
}