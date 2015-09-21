<?php
/**
 * Extends init() to add extra requirements
 *
 * @package plato-silverstripe-hometiles
 */
class HomePageTiles_ControllerExtension extends DataExtension
{
    /**
     * Inject requirements after main init
     */
    public function onAfterInit()
    {
        Requirements::css(HOMETILES_DIR . '/css/hometiles.css');
    }

}
