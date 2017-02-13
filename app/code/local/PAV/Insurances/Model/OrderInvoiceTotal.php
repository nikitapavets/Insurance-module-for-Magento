<?php

class PAV_Insurances_Model_OrderInvoiceTotal extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getOrder()->getShippingInsurance());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getOrder()->getBaseShippingInsurance());

        return $this;
    }
}
