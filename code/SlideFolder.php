<?php

/**
* Defines the SlideFolder type
*/
class SlideFolder extends Page
{
    public static $default_child = 'SlidePage';

    public static $allowed_children = array('SlidePage');

    // Hide terms from the LHS menu and search
    public static $defaults = array(
    'ShowInMenus' => 0,
    'ShowInSearch' => 0
    );
}

class SlideFolder_Controller extends Page_Controller
{
}
