<?php

class PAV_Insurances_Model_Insurance extends Mage_Core_Model_Abstract
{
    const TYPE_ABSOLUTE = 0;
    const TYPE_PERCENT = 1;

    /**
     * @return bool|string
     */
    public static function getType()
    {
        return self::isEnable() ? Mage::getStoreConfig('insurances/settings/insurance_type') : false;
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


    public function _construct()
    {
        parent::_construct();
        $this->_init('insurances/insurance');
    }
}
