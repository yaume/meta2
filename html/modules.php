<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.meta
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
  if ($module->content)
	{
		echo $module->content;
	}
}
function modChrome_menu($module, &$params, &$attribs)
{
	echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
	echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span></button>';
	echo '<div class="collapse navbar-collapse" id="mainmenu">';
	echo $module->content;
	echo '</div>';
	echo '</nav>';
}
function modChrome_footerMenu($module, &$params, &$attribs){
	echo '<nav class="navbar col-lg-6 justify-content-center navbar-expand py-0 order-1 navbar-light bg-light">';
	echo $module->content;
	echo '</nav>';
}
function modChrome_footerCopyright($module, &$params, &$attribs){
	echo'<div class="col-lg-3 order-2 order-lg-0">';
	echo $module->content;
	echo '</div>';
}
function modChrome_footerSocial($module, &$params, &$attribs){
	echo'<div class="col-lg-3 order-0 order-lg-2">';
	echo $module->content;
	echo '</div>';
}