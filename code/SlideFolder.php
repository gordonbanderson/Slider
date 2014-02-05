<?php
/**
* Defines the StaffPage page type
*/
class SlideFolder extends Page {

  static $default_child = 'SlidePage';

  static $allowed_children = array('SlidePage');

  // Hide terms from the LHS menu
  static $defaults = array( 
    'ShowInMenus' => 0,
    //'ShowInSearch' => 0
  );





  

  function getCMSFields() {
    $fields = parent::getCMSFields();

    /*
    $tablefield = new DataObjectManager(
    $this,
    'Slides',
    'Slide',
    array(
        'Caption' => 'Caption',
        'Thumbnail' => 'Slide Image'
    ),
    'getCMSFields_forPopup'
);

$tablefield->setAddTitle( 'A Slide' );
$fields->addFieldToTab( 'Root.Content.Slides', $tablefield );
*/


    return $fields;
  }


}

class SlideFolder_Controller extends Page_Controller {

}

?>