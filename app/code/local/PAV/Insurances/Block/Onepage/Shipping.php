<?php

class PAV_Insurances_Block_Onepage_Shipping extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
    public function getShippingRates()
    {
        $shippingInsuranceBlock = '
            <dl>
                <dt style="font-weight: bold">Shipping insurance</dt>
                <dd style="margin: 10px">
                    Use <span><input type="checkbox" name="is_shipping_insurance"></span>
                </dd>
            </dl>';
        echo $shippingInsuranceBlock;

        return parent::getShippingRates();
    }
}