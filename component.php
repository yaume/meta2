<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.meta
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
// Load template framework 
include_once JPATH_THEMES . '/' . $this->template . '/lib/head.php';

// Output as HTML5
$this->setHtml5(true);

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="contentpane">
	<main>
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</main>

</body>
</html>