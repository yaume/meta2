<?php defined('_JEXEC') or die;
/* =====================================================================
Template: Patty saveurs
Author:   guillaume@ordi-service.fr
Version:  1.0
Created:  September 2015
Copyright:  Guillaume Singlan - (C) 2015 - All rights reserved
Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
===================================================================== */
// //Touch icon for iOS 2.0+ and Android 2.1+:
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" href="'.$template .'/fav/favicon152.png">');
// //IE 10 Metro tile icon 
// $doc->setMetadata('msapplication-TileColor', '#FFFFFF');
// $doc->setMetadata('msapplication-TileImage', ''.$template .'/fav/favicon144.png');
// //For iPad with high-resolution Retina display running iOS ≥ 7
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'.$template .'/fav/favicon152.png">');
// //For iPad with high-resolution Retina display running iOS ≤ 6
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.$template.'/fav/favicon144.png">');
// //For iPhone with high-resolution Retina display running iOS ≥ 7:
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'.$template.'/fav/favicon120.png">');
// //For iPhone with high-resolution Retina display running iOS ≤ 6:
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.$template.'/fav/favicon114.png">');
// //For first- and second-generation iPad: -->
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="'.$template.'/fav/favicon76.png">');
// //For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
// $doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" href="'.$template.'/fav/favicon57.png">');
// //Favicons targeted to any additional png sizes that you add that aren't covered above:
// $doc->addCustomTag( '<link rel="icon" href="'.$template.'/fav/favicon32.png" sizes="32x32">');

$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.$template .'/fav/apple-touch-icon-57x57.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.$template .'/fav/apple-touch-icon-114x114.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.$template .'/fav/apple-touch-icon-72x72.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.$template .'/fav/apple-touch-icon-144x144.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="60x60" href="'.$template .'/fav/apple-touch-icon-60x60.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'.$template .'/fav/apple-touch-icon-120x120.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="'.$template .'/fav/apple-touch-icon-76x76.png" />');
$doc->addCustomTag( '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'.$template .'/fav/apple-touch-icon-152x152.png" />');
$doc->addCustomTag( '<link rel="icon" type="image/png" href="'.$template .'/fav/favicon-196x196.png" sizes="196x196" />');
$doc->addCustomTag( '<link rel="icon" type="image/png" href="'.$template .'/fav/favicon-96x96.png" sizes="96x96" />');
$doc->addCustomTag( '<link rel="icon" type="image/png" href="'.$template .'/fav/favicon-32x32.png" sizes="32x32" />');
$doc->addCustomTag( '<link rel="icon" type="image/png" href="'.$template .'/fav/favicon-16x16.png" sizes="16x16" />');
$doc->addCustomTag( '<link rel="icon" type="image/png" href="'.$template .'/fav/favicon-128.png" sizes="128x128" />');
$doc->setMetadata('application-name', 'META Monaco');
$doc->setMetadata('msapplication-TileColor', '#FFFFFF');
$doc->setMetadata('msapplication-TileImage', $template .'/fav/mstile-144x144.png');
$doc->setMetadata('msapplication-square70x70logo', $template .'/fav/mstile-70x70.png');
$doc->setMetadata('msapplication-square150x150logo', $template .'/fav/mstile-150x150.png');
$doc->setMetadata('msapplication-wide310x150logo', $template .'/fav/mstile-310x150.png');
$doc->setMetadata('msapplication-square310x310logo', $template .'/fav/mstile-310x310.png');