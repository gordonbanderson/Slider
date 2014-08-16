<?php
/**
* Defines the StaffPage page type
*/

class SlidePage extends Page {
    static $db = array(
        'Caption' => 'Text'
    );
    static $has_one = array(
        'Photo' => 'Image',
        'InternalPage' => 'SiteTree'
    );


    static $allowed_children = 'none';

    static $defaults = array( 
        'ShowInMenus' => 0,
        //'ShowInSearch' => 0
      );




    
    /** 
    Create the fields that are required to edit this model

    @return Fields to edit the content type WebsitePortfolioPage
     **/
    function getCMSFields() {
        $fields = parent::getCMSFields();
        $existing_photo = null;
        $photo_field = new UploadField('Photo', _t('SlidePage.PHOTO', 'Photo'));
        $photo_info = new LiteralField('PhotoInfo', _t('Slide.PHOTO_INFO','If the page you choose to link to has an image already it will appear here'), 'Photo');
        $composite_photoField = CompositeField::create($photo_field, $photo_info);
        $fields->addFieldToTab("Root.Main", $composite_photoField);
        $fields->addFieldToTab("Root.Main", new TextField('Caption', _t('SlidePage.CAPTION', 'Caption')));
        $fields->renameField('Title', 'Slide Title');

        $fields->removeFieldFromTab("Root.Main","Content");
        $fields->addFieldToTab('Root.Main',          new TreeDropdownField( "InternalPageID", _t('SlidePage.CHOOSE_INTERNAL_LINK', 'Select a page on the website'), "SiteTree" ));

        // TRACE2 - one to many

        // CODE TRACE2 - has one


        return $fields;
    }



    function getThumbnail() {
        if ($Image = $this->Photo()) {
            
            return $Image->CMSThumbnail();
        } else {
            
            return '(No Image)';
        }
    }


    function getWebsiteAddress() {
        $result = '#"';

        if ($this->InternalPageID) {
            $targetPage = DataObject::get_by_id( 'Page', $this->InternalPageID );
            if ( $targetPage ) {
                $result = $targetPage->Link();
            } else {
                $result = '#';
            }
        }
       
       
        return $result;
    }
}

class SlidePage_Controller extends Page_Controller {
}
?>