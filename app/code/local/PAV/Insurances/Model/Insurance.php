<?php

class PAV_Insurances_Model_Insurance extends Mage_Core_Model_Abstract
{
    const TYPE_ABSOLUTE = 0;
    const TYPE_PERCENT = 1;
    const NO_TYPE = 2;

    /**
     * @return bool|string
     */
    public static function getType()
    {
        return self::isChecked() ? Mage::getStoreConfig('insurances/settings/type') : self::NO_TYPE;
    }

    /**
     * @return bool|string
     */
    public static function isChecked()
    {
        return (bool)self::isEnable() ? Mage::getStoreConfig('insurances/settings/is_checked') : false;
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
        return self::isChecked() ? Mage::getStoreConfig('insurances/settings/absolute_value') : false;
    }

    /**
     * @return bool|string
     */
    public static function getPersentValue()
    {
        return self::isChecked() ? Mage::getStoreConfig('insurances/settings/percent_value') : false;
    }

    public static function setChecked()
    {
        Mage::app()->getConfig()->saveConfig('insurances/settings/is_checked', 1);
    }

    public static function resetChecked()
    {
        Mage::app()->getConfig()->saveConfig('insurances/settings/is_checked', 0);
    }

    public function _construct()
    {
        parent::_construct();
        $this->_init('insurances/insurance');
    }
}
