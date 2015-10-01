<?php
/**
 * Pushed a gridifeld into the home page of a site
 * which lets you manage home tiles.
 *
 * @package plato-silverstripe-hometiles
 */
class HomePageTilesExtension extends DataExtension
{
    /**
	 * @var array
	 */
    private static $has_many = array(
		"HomeTiles" => "HomeTile"
	);

    /**
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $tilesConfig = new GridFieldConfig_RelationEditor();
        if(class_exists('GridFieldSortableRows')) $tilesConfig->addComponent(new GridFieldSortableRows('Sort'));

        if ($this->owner->HomeTiles()->Count() == $this->owner->config()->HomeTilesLimit) {
            $tilesConfig->removeComponentsByType('GridFieldAddNewButton');
        }

		$slidesGrid = GridField::create('HomeTiles', 'HomeTiles', $this->owner->HomeTiles(), $tilesConfig);
		$fields->addFieldToTab('Root.Tiles', $slidesGrid);

        return $fields;
    }

    /**
     * @return Int
     * @config()
     */
    public function getHomeTilesLimit() {
        return ($this->owner->config()->HomeTilesLimit ? $this->owner->config()->HomeTilesLimit : 3);
    }
}
