<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params = $displayData->params;

?>
<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>" alt="<?php echo $displayData->title;?>">
	<figure class="item-image">
	<img src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" class="img-fluid"  itemprop="thumbnailUrl"/>
	<figcaption>
	<?php echo $displayData->title; ?>
	</figcaption>
	<?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid,$displayData->language));?>
	<?php echo JLayoutHelper::render('meta.joomla.content.readmore', array('item' => $displayData->slug, 'params' => $params, 'link' => $link),''); ?>
	</figure>

<?php endif; ?>



