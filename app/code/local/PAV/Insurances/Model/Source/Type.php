<?php

class PAV_Insurances_Model_Source_Type
{
    const ABSOLUTE_VALUE = '0';
    const PERCENT_VALUE = '1';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::ABSOLUTE_VALUE, 'label' => 'Absolute value'),
            array('value' => self::PERCENT_VALUE, 'label' => 'Percentage of the value'),
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            self::ABSOLUTE_VALUE => 'Absolute value',
            self::PERCENT_VALUE => 'Percentage of the value',
        );
    }
}
