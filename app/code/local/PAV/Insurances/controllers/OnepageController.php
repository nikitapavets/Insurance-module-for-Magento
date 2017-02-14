<?php

require_once "Mage/Checkout/controllers/OnepageController.php";

class PAV_Insurances_OnepageController extends Mage_Checkout_OnepageController
{
    /**
     * Shipping method save action
     */
    public function saveShippingMethodAction()
    {
        if ($this->getRequest()->getPost('is_shipping_insurance') == 'on') {
            PAV_Insurances_Model_Insurance::setChecked();
        } else {
            PAV_Insurances_Model_Insurance::resetChecked();
        }

        parent::saveShippingMethodAction();
    }
}