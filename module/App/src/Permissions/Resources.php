<?php

namespace App\Permissions;

class Resources extends \Ctrl\Permissions\Resources
{
    /**
     * Sets
     */
    const SET_ACTIONS   = 'actions.App';

    public function getSets()
    {
        return array_merge(
            parent::getSets(),
            array(
                self::SET_ACTIONS,
            )
        );
    }

    public function getResources($set = null)
    {
        $resources = array_merge(
            parent::getResources(),
            array(
                self::SET_ROUTES => array(
                    'App\Controller',
                ),
                self::SET_ACTIONS => array(
                    //none
                ),
                self::SET_MENU => array(
                    'App' => array(
                        'Index'
                    )
                ),
            )
        );

        $resources = $this->assertResources($resources);

        return $resources;
    }
}
