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
	echo '<a class="btn btn-light toggler open" type="button" href="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
	<i class="fa fa-bars" aria-hidden="true"></i></a>';
	echo '<nav class="navbar" id="nav">';
	echo $module->content;
	echo '</nav>';
}
function modChrome_footerMenu($module, &$params, &$attribs){
	echo '<nav class="footer-navbar">';
	echo $module->content;
	echo '</nav>';
}
function modChrome_footerCopyright($module, &$params, &$attribs){
	echo $module->content;
}
function modChrome_footerSocial($module, &$params, &$attribs){
	echo $module->content;
}