<?php

class PAV_Insurances_Block_Onepage_Shipping extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
    public function getShippingRates()
    {
        $insuranceValue = PAV_Insurances_Model_Insurance::getValue(
            array_sum($this->getAddress()->getAllTotalAmounts())
        );

        $shippingInsuranceBlock = '
            <dl>
                <dt style="font-weight: bold">Shipping insurance</dt>
                <dd style="margin: 10px">
                    <span>Use</span>
                    <input type="checkbox" name="is_shipping_insurance" id="shippingInsuranceCheckbox">
                    <span id="shippingInsuranceValue" class="hidden">$'.$insuranceValue.'</span>
                </dd>
            </dl>';
        $scripts = '
            <script>
                    var shippingInsuranceCheckbox = document.getElementById("shippingInsuranceCheckbox");
                    shippingInsuranceCheckbox.onclick = function(e) {
                        var shippingInsuranceValue = document.getElementById("shippingInsuranceValue");
                      if(!shippingInsuranceCheckbox.checked){
                         shippingInsuranceValue.className = "hidden";
                      } else {
                          shippingInsuranceValue.className = "";
                      }
                    }
            </script>
        ';
        echo $shippingInsuranceBlock;
        echo $scripts;

        return parent::getShippingRates();
    }
}
