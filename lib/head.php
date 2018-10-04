<?php defined('_JEXEC') or die;
/* =====================================================================
Template: Meta
Author:   guillaume@ordi-service.fr
Version:  1.0
Created:  September 2018
Copyright:  Guillaume - (C) 2018 - All rights reserved
Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
===================================================================== */

// Define shortcuts for template parameters
$loadMoo				= $this->params->get('loadMoo');
$offcanvas				= $this->params->get('offcanvas');
$setGeneratorTag		= $this->params->get('setGeneratorTag');
$analytics				= $this->params->get('analytics');
$customCSS				= $this->params->get('customCSS');
$defaultWidth			= '';
$setWidth				= $this->params->get('setWidth');
$widthUnit				= $this->params->get('widthUnit');
$topbarTitle			= $this->params->get('topbarTitle');
$stickyTopMenu			= $this->params->get('stickyTopMenu');
$googleplus				= $this->params->get('googleplus');
$googleWebFonts 		= $this->params->get('googleWebFonts');
$twitter				= $this->params->get('twitter');
$twitterLink			= $this->params->get('twitterLink');
$dribbble				= $this->params->get('dribbble');
$dribbbleLink			= $this->params->get('dribbbleLink');
$facebook				= $this->params->get('facebook');
$facebookLink			= $this->params->get('facebookLink');
$googleplus				= $this->params->get('googleplus');
$googleplusLink			= $this->params->get('googleplusLink');
$github					= $this->params->get('github');
$githubLink				= $this->params->get('githubLink');
$TopMenuWidth			= $this->params->get('TopMenuWidth');
$active					= JFactory::getApplication()->getMenu()->getActive();
//Topmenu
$topmenu = ($stickyTopMenu?1:0)+ ($TopMenuWidth?1:0);
$fixed = "";
$ctg = "";
if ( $stickyTopMenu == 1 ) { $fixed = "fixed"; }
if ( $TopMenuWidth == 1 ) { $ctg = "contain-to-grid"; }
//Offcanvas
$oc = ($offcanvas?1:0);
// Do we have social links?
$social                = ($twitterLink?1:0)+ ($dribbbleLink?1:0)+ ($facebookLink?1:0)+ ($googleplusLink?1:0)+ ($githubLink?1:0);

if ($this->countModules('position-5') == 0)  {$rightwidth = 0;} else {$rightwidth = (int) ($this->params->get('rightwidth'));}
if ($this->countModules('position-3') == 0)  {$leftwidth = 0;} else {$leftwidth = (int) ($this->params->get('leftwidth'));}
if ($widthUnit=='rem'){
    $colcount = $rightwidth + $leftwidth;
    $coltotal = 12 - $colcount;
    $mainwidth = 'large-'.$coltotal;
    $rightWidth = 'large-'.$rightwidth;
    $leftWidth = 'large-'.$leftwidth;
    $setWidth = $setWidth*12/$coltotal;
}
else{
$colcount = $rightwidth + $leftwidth;
$coltotal = 12 - $colcount;

$mainwidth = 'large-'.$coltotal;
$rightWidth = 'large-'.$rightwidth;
$leftWidth = 'large-'.$leftwidth;
}
// Modules
$aboveheader = (int) ($this->countModules('position-1-1') > 0);
$header = (int) ($this->countModules('position-1') > 0);
$belowheader = (int) ($this->countModules('position-1-2') > 0);
$abovenav = (int) ($this->countModules('position-2-1') > 0);
$nav = (int) ($this->countModules('position-2') > 0);
$belownav = (int) ($this->countModules('position-2-2') > 0);
$abovecontent = (int) ($this->countModules('position-4-1') > 0);
$left = (int) ($this->countModules('position-3') > 0);
$right = (int) ($this->countModules('position-5') > 0);
$belowcontent = (int) ($this->countModules('position-4-2') > 0);
$abovefooter = (int) ($this->countModules('position-6-1') > 0);
$footer = (int) ($this->countModules('position-6') > 0);
$belowfooter = (int) ($this->countModules('position-6-2') > 0);


#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/

// To enable use of site configuration
$app 		= JFactory::getApplication();
$pageParams  	= $app->getParams();
$sitename	= $app->getCfg('sitename');
$title = $this->getTitle();
$pageclass = $pageParams->get( 'pageclass_sfx' );
// Returns a reference to the global document object
$doc = JFactory::getDocument();
$base = $this->baseurl;
// Define relative path to the current template directory
$template = 'templates/'.$this->template;

// Change generator tag
$this->setGenerator($setGeneratorTag);

//$this->setTitle( $sitename . ' | ' . $title);

// Remove MooTools if set to no.
if ( !$loadMoo ) {
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
}

#-------------End Construct Code--------------------------------------#
// get html head data
$head = $doc->getHeadData();
// remove deprecated meta-data (html5)
unset($head['metaTags']['http-equiv']);
unset($head['metaTags']['standard']['title']);
unset($head['metaTags']['standard']['rights']);
unset($head['metaTags']['standard']['language']);
$doc->setHeadData($head);
// Output as HTML5
$doc->setHtml5(true);
// New meta
$doc->setMetadata('X-UA-Compatible', 'IE=edge,chrome=1');
$doc->setMetadata('viewport', 'width=device-width, initial-scale=1.0');
$doc->setMetadata('charset','UTF-8');
//Pinterest confirmation
//$doc->setMetadata('p:domain_verify','eadad72d938a4eed06e9685eefbeb0cf');
//<meta name="" content=/>
// Copyrights
$doc->setMetadata('copyright', htmlspecialchars($app->getCfg('sitename')));
//humans.txt
$doc->addHeadLink( $template . '/humans.txt', 'author', 'rel','');
include_once JPATH_THEMES . '/' . $this->template . '/lib/favicon.php';
include_once JPATH_THEMES . '/' . $this->template . '/lib/opengraph.php';
//Add your styles
$doc->addStyleSheet($template . '/css/meta.css');