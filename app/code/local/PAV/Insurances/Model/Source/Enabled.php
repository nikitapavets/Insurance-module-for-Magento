<?php

class PAV_Insurances_Model_Source_Enabled
{
    const ENABLED = '1';
    const DISABLED = '0';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::ENABLED, 'label' => 'Enabled'),
            array('value' => self::DISABLED, 'label' => 'Disabled'),
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            self::ENABLED => 'Enabled',
            self::DISABLED => 'Disabled',
        );
    }
}
