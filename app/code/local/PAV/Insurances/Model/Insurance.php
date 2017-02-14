<?php

class PAV_Insurances_Model_Insurance extends Mage_Core_Model_Abstract
{
    const TYPE_ABSOLUTE = 0;
    const TYPE_PERCENT = 1;
    const NO_TYPE = 2;

    public static function setChecked()
    {
        Mage::getSingleton('core/session')->setCheckedShippingInsurance(1);
    }

    public static function resetChecked()
    {
        Mage::getSingleton('core/session')->setCheckedShippingInsurance(0);
    }

    /**
     * @param float $totals
     * @return float
     */
    public static function getValue($totals)
    {
        $insuranceValue = 0;
        if (self::getType() == self::TYPE_ABSOLUTE) {
            $insuranceValue = self::getAbsoluteValue();
        } elseif (self::getType() == self::TYPE_PERCENT) {
            $insuranceValue = $totals * self::getPersentValue() / 100;
        }

        return $insuranceValue;
    }

    /**
     * @return bool|string
     */
    public static function getType()
    {
        return self::isEnable() ? Mage::getStoreConfig('insurances/settings/type') : self::NO_TYPE;
    }

    /**
     * @return bool
     */
    public static function isEnable()
    {
        return (bool)Mage::getStoreConfig('insurances/settings/enabled');
    }

    /**
     * @return bool|string
     */
    public static function getAbsoluteValue()
    {
        return self::isEnable() ? Mage::getStoreConfig('insurances/settings/absolute_value') : false;
    }

    /**
     * @return bool|string
     */
    public static function getPersentValue()
    {
        return self::isEnable() ? Mage::getStoreConfig('insurances/settings/percent_value') : false;
    }

    /**
     * @return bool|string
     */
    public static function isChecked()
    {
        return (bool)self::isEnable() ?
            Mage::getSingleton('core/session')->getCheckedShippingInsurance() : false;
    }

    public function _construct()
    {
        parent::_construct();
        $this->_init('insurances/insurance');
    }
}
