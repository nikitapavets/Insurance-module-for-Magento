<?php
class PAV_Insurances_Model_Observer {
    public function orderSaveBefore($obs) {
        $event = $obs->getEvent();
        $order = $event->getOrder();

        $items = $order->getQuote()->getAllItems();
        $orderdata = Mage::getModel('sales/order')->load($order->getEntityId());
        $orderdata->setInsurance(44);
        $orderdata->save();

        $order->getResource()->saveAttribute($order, 'insurance');
    }
}
