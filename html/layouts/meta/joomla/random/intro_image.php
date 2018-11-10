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
<?php $images = json_decode($displayData->images);
		$alias = $displayData->alias;?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>" alt="<?php echo $displayData->title;?>">
	<figure class="item-image">
	<img srcset="images/random/<?php echo $alias; ?>/<?php echo $alias; ?>-thumbnail-325.jpg 325w,
				 images/random/<?php echo $alias; ?>/<?php echo $alias; ?>-thumbnail-710.jpg 710w,
				 images/random/<?php echo $alias; ?>/<?php echo $alias; ?>-thumbnail-975.jpg 975w,
				 images/random/<?php echo $alias; ?>/<?php echo $alias; ?>-thumbnail-2125.jpg 2125w"
		 sizes="(max-width: 540px) 325px,
				(max-width:  720px) 710px,
				(max-width:  960px) 975px,
				2125px"
		 src="images/random/<?php echo $alias; ?>/<?php echo $alias; ?>-thumbnail-2125.jpg"
	alt="<?php echo htmlspecialchars($alias, ENT_COMPAT, 'UTF-8'); ?>" class="img-fluid"  itemprop="thumbnailUrl"/>
	<figcaption>
	<?php echo $displayData->title; ?>
	</figcaption>
	<?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid,$displayData->language));?>
	<?php echo JLayoutHelper::render('meta.joomla.random.readmore', array('item' => $displayData->slug, 'params' => $params, 'link' => $link),''); ?>
	</figure>

<?php endif; ?>



