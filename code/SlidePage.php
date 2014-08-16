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


    public function getThumbnail2() { 
      return $this->InternalPage()->getPortletImage()->CMSThumbnail()->Tag;
   }




    
    /** 
    Create the fields that are required to edit this model

    @return Fields to edit the content type WebsitePortfolioPage
     **/
    function getCMSFields() {
        $fields = parent::getCMSFields();
        $existing_photo = null;
        $photo_field = null;
        $internal_page = $this->InternalPage();

        if($internal_page instanceof RenderableAsPortlet) {
            error_log('Class implements renderable as a portlet');
            $existing_photo = $this->InternalPage()->getPortletImage();
        } else {
            // check parents recursively
            $parents = class_parents($internal_page);
            error_log(print_r($parents,1));
        }

        $composite_photoField = null;

        if (!$existing_photo) {
            $photo_field = new UploadField('Photo', _t('SlidePage.PHOTO', 'Photo'));
            $photo_info = new LiteralField('PhotoInfo', _t('Slide.PHOTO_INFO','If the page you choose to link to has an image already it will appear here'), 'Photo');
            $composite_photoField = CompositeField::create($photo_field, $photo_info);

        } else {
            // FIXME, find a cleaner way of doing this
            $composite_photoField = new LiteralField('Thumbnail2', '<div id="Thumbnail2" class="field readonly">
    <label class="left" for="Form_EditForm_Thumbnail2">Photo</label>
    <div class="middleColumn">
    <span id="Form_EditForm_Thumbnail2" class="readonly">
        <img src="'.$existing_photo->SetWidth(400)->URL.'" alt="'.$existing_photo->Title.'" />
    </span>
    </div>
</div>');
        }
        
        $composite_photoField->setTitle('Photo');
        $fields->addFieldToTab("Root.Main", $composite_photoField);
        $fields->addFieldToTab("Root.Main", new TextField('Caption', _t('SlidePage.CAPTION', 'Caption')));
        $fields->renameField('Title', 'Slide Title');

        $fields->removeFieldFromTab("Root.Main","Content");
        $fields->addFieldToTab('Root.Main',
            new TreeDropdownField( "InternalPageID", _t('SlidePage.CHOOSE_INTERNAL_LINK', 'Select a page on the website'), "SiteTree" ));

        return $fields;
    }

    function getPortletImage() {
        $image = null;
        if ($this->InternalPage() instanceof RenderableAsPortlet) {
            $image = $this->InternalPage()->getPortletImage();
        } else {
            $image = $this->Photo();
        }
        return $image;
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