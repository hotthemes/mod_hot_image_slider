<?php
/*------------------------------------------------------------------------
# Hot Image Slider - Free Joomla module
# Copyright (C) 2013 HotThemes. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 only
# Author: HotThemes
# Website: https://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); // no direct access

if ($showButtons==0) {
  $showButtonsDisplay = 'display:none;';
} else {
  $showButtonsDisplay = '';
}

// get the document object
$doc = JFactory::getDocument();

// load jQuery
JHtml::_('jquery.framework');

// add your stylesheet
$doc->addStyleSheet( $mosConfig_live_site.'/modules/mod_hot_image_slider/tmpl/style.css' );

// style declaration
$doc->addStyleDeclaration( '

div.hotimageslider_container {
  border:'.$borderWidth.'px solid '.$backgroundColor.';
  margin:0 auto;
  background:'.$backgroundColor.'
}

div#header_hotslider div.hotwrap {
  background:'.$backgroundColor.';
}

div#header_hotslider div#slide-holder div#slide-controls {
  background:url('.$mosConfig_live_site.'/modules/mod_hot_image_slider/images/slide-bg.png) 0 0;
}

div#header_hotslider div#slide-holder div#slide-controls div#slide-nav {
  float:right;
  '.$showButtonsDisplay.'
}

div#header_hotslider div#slide-holder div#slide-controls p.text {
  color:'.$nameColor.';
  font-size:'.$nameSize.'px;
}

p.textdesc {
  float:left;
  display:inline;
  font-size:'.$descSize.'px;
  margin:25px 0 0 20px;
  text-transform:uppercase;
  overflow:hidden;
  color:'.$descColor.';
}

div#header_hotslider div#slide-holder div#slide-controls div#slide-nav a {
  background:'.$buttonColor.';
  border-radius:50%;
  color:'.$buttonTextColor.';
  top:11px;
  position:relative;
  border:1px solid #111;
}

div#header_hotslider div#slide-holder div#slide-controls div#slide-nav a:hover, div#header_hotslider div#slide-holder div#slide-controls div#slide-nav a.on {
  background:'.$buttonColorHover.';
  color:'.$buttonTextColorHover.';
}

' );

if($textShadow) { $doc->addStyleDeclaration( '

div#header_hotslider div#slide-holder div#slide-controls p.text, p.textdesc {
  text-shadow:2px 2px 3px #000000;
}

' );
}
?>

<script type="text/javascript">var _siteRoot='index.php',_root='index.php';</script>

<div class="hotimageslider_container">
  <div id="header_hotslider">
    <div class="hotwrap">
      <div id="slide-holder">
        <div id="slide-runner">
          <?php for ($imageCounter = 1; $imageCounter <= 30; $imageCounter += 1) { ?>
          	<?php if ($imageArray[$imageCounter]) { ?>
              <?php if (($showLink!=0)and($imageLinkArray[$imageCounter]!="")) { ?><a href="<?php echo $imageLinkArray[$imageCounter]; ?>"<?php if($linkNewWindow) { ?> target="_blank"<?php } ?>><?php } ?>

                  <img id="slide-img-<?php echo $imageCounter; ?>" src="<?php echo $mosConfig_live_site; ?>/<?php echo $imageArray[$imageCounter]; ?>" class="slide" alt="" />
              <?php if (($showLink!=0)and($imageLinkArray[$imageCounter]!="")) { ?></a><?php } ?>
              <?php } ?>
          <?php } ?>
          <div id="slide-controls">
               <div id="slide-nav"></div>
               <?php if ($showNames!=0) { ?><p id="slide-client" class="text"><span></span></p><?php } ?>
               <?php if ($showDesc!=0) { ?>
               <div style="clear:both"></div>
               <p id="slide-desc" class="textdesc"></p>
          	 <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function hotImageSlider(){
    var container_width = jQuery("div.hotimageslider_container").parent().width();
    if ( container_width > <?php echo $maxWidth; ?>) { container_width = <?php echo $maxWidth; ?>; }
    var container_height = jQuery("div.hotimageslider_container img.slide").first().height();
    var border_size = <?php echo $borderWidth; ?>;
    var container_real_width = container_width - border_size * 2;
    var container_real_height = container_height - border_size * 2;

    jQuery("div.hotimageslider_container, div#header_hotslider div#slide-holder div#slide-runner, div#header_hotslider div#slide-holder div#slide-controls, div#header_hotslider div#slide-holder img, div#header_hotslider div#slide-holder").css("width",container_real_width);

    jQuery("div.hotimageslider_container, div#header_hotslider div.hotwrap, div#header_hotslider div#slide-holder, div#header_hotslider div#slide-holder div#slide-runner").css("height",container_real_height);
  }

  jQuery(window).load(function() {
    hotImageSlider();
  });
  jQuery(document).ready(function() {
    hotImageSlider();
  });
  jQuery(window).resize(function(){
    hotImageSlider();
  });
</script>

<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_hot_image_slider/js/hotImageSlider.js"></script>

<script type="text/javascript">
  if(!window.slider) var slider={};slider.anim='<?php echo $animation; ?>';slider.fade_speed=<?php echo $fadeSpeed; ?>;slider.data=[
  <?php $imageSRC=""; ?>
  <?php for ($titleCounter = 1; $titleCounter <= 30; $titleCounter += 1) { ?>
    <?php if ($imageArray[$titleCounter]) { ?>
    <?php $imageSRC .= '{"id":"slide-img-'.$titleCounter.'","client":"'.$imageTitleArray[$titleCounter].'","desc":"'.$imageDescArray[$titleCounter].'"},'; ?>
    <?php } ?>
  <?php } ?>
  <?php $imageREDUCED = substr($imageSRC, 0, -1); echo $imageREDUCED; ?>
  ];
</script>