<?php
/*------------------------------------------------------------------------
# Hot Image Slider - Free Joomla module
# Copyright (C) 2013 HotThemes. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 only
# Author: HotThemes
# Website: https://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();
if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }
 
// get parameters from the module's configuration
$borderWidth = $params->get('borderWidth','20');
$maxWidth = $params->get('maxWidth','960');
$backgroundColor = $params->get('backgroundColor','#000000');
$nameColor = '#ffffff';
$nameSize = '14';
$descColor = '#ffffff';
$descSize = '10';
$textShadow = '1';
$showButtons = 1;
$showNames = $params->get('showNames','1');
$showDesc = $params->get('showDesc','1');
$showLink = $params->get('showLink','1');
$linkNewWindow = $params->get('linkNewWindow','0');
$buttonColor = '#acc48c';
$buttonColorHover = '#111111';
$buttonTextColor = '#ffffff';
$buttonTextColorHover = '#ffffff';
$animation   = $params->get('animation','slide');
$fadeSpeed   = $params->get('fadeSpeed','600');

for ($loop = 1; $loop <= 30; $loop += 1) {
$imageArray[$loop] = $params->get('image'.$loop,'');
}

for ($loop = 1; $loop <= 30; $loop += 1) {
$imageTitleArray[$loop] = $params->get('image'.$loop.'title','');
}

for ($loop = 1; $loop <= 30; $loop += 1) {
$imageDescArray[$loop] = $params->get('image'.$loop.'desc','');
}

for ($loop = 1; $loop <= 30; $loop += 1) {
$imageLinkArray[$loop] = $params->get('image'.$loop.'link','');
}

require(JModuleHelper::getLayoutPath('mod_hot_image_slider'));
