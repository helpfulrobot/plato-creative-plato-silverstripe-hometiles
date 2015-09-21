<?php
/**
* HomePage Tile
*
* @package plato-silverstripe-hometiles
*/
class HomeTile extends DataObject {

    private static $default_sort = "Sort";

    private static $db = array(
        "Title" => "Varchar(255)",
        "Content" => "Text",
        "ExternalLinkURL" => "Varchar(255)",
        "LinkTitle" => "Varchar(255)",
        "Sort" => "Int"
    );

    private static $has_one = array(
        "HomePage" => "HomePage",
        "LinkTo" => "Page",
        "Image" => "Image"
    );

    private static $summary_fields = array(
        "Title" => "Title",
        "Image.CMSThumbnail" => "Image"
    );

    public function getCMSFields() {
        $fields = new FieldList(
            TextField::create('Title', 'Title')->setDescription("Title of the tile"),
            TextareaField::create('Content', 'Content')->setDescription("Content of the tile"),
            DropdownField::create("LinkToID", "Internal Link", Page::get()->map())->setEmptyString("Select a page"),
            TextField::create("ExternalLinkURL", "External Link")->setAttribute("placeholder", "http://website.com/"),
            TextField::create('LinkTitle', 'Link Title')->setDescription("Title of link"),
            UploadField::create('Image', 'Image')->setFolderName("HomeTiles")
        );
        return $fields;
    }

}
