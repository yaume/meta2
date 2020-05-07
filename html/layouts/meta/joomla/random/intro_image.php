<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params  = $displayData->params;
$alias = $displayData->alias;
$link = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language));
$imgl='images/random/'.$alias.'/'.$alias;
?>
<?php $images = json_decode($displayData->images); ?>
	<a href="<?php echo $link; ?>" alt="<?php echo $displayData->title;?>">
	<figure class="item-image">
	<picture>
			<source sizes="(max-width: 991px) 90vw, 26vw" srcset="
			<?php echo $imgl.'-thumbnail-325.webp'; ?> 325w,
			<?php echo $imgl.'-thumbnail-710.webp'; ?> 710w,
			<?php echo $imgl.'-thumbnail-975.webp'; ?> 975w,
			<?php echo $imgl.'-thumbnail-2125.webp'; ?> 2125w" type="image/webp">
			<source sizes="(max-width: 991px) 90vw, 26vw" srcset="
			<?php echo $imgl.'-thumbnail-325.jpg'; ?> 325w,
			<?php echo $imgl.'-thumbnail-710.jpg'; ?> 710w,
			<?php echo $imgl.'-thumbnail-975.jpg'; ?> 975w,
			<?php echo $imgl.'-thumbnail-2125.jpg'; ?> 2125w">
			<img src="<?php echo $imgl; ?>-thumbnail-2125.jpg"
				alt="<?php echo htmlspecialchars($alias, ENT_COMPAT, 'UTF-8'); ?>" class="img-fluid"
				itemprop="thumbnailUrl" />
		</picture>
	<figcaption>
	<?php echo $displayData->title; ?>
	</figcaption>
	<?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid,$displayData->language));?>
	<?php echo JLayoutHelper::render('meta.joomla.random.readmore', array('item' => $displayData->slug, 'params' => $params, 'link' => $link),''); ?>
	</figure>
	</a>



