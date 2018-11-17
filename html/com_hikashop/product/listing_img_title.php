<?php
/**
 * @package	HikaShop for Joomla!
 * @version	3.5.1
 * @author	hikashop.com
 * @copyright	(C) 2010-2018 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$mainDivName = $this->params->get('main_div_name', '');
$link = hikashop_contentLink('product&task=show&cid=' . (int)$this->row->product_id . '&name=' . $this->row->alias . $this->itemid . $this->category_pathway, $this->row);
$haveLink = (int)$this->params->get('link_to_product_page', 1);

if(!empty($this->row->extraData->top)) { echo implode("\r\n",$this->row->extraData->top); }

?>
<div class="meta_monaco_listing item">

	<?php if($haveLink) { ?>
	<a href="<?php echo $link;?>" title="<?php echo $this->escape($this->row->product_name); ?>">
		<?php } ?>
			<figure>
				<?php
	$img = 'images/meta_monaco_products/'.$this->row->product_code.'/'.$this->row->product_code.'-1064.jpg';
		echo '<img class="meta_monaco_product_listing_image img-fluid" title="'.$this->escape(@$this->row->file_description).'" alt="'.$this->escape(@$this->row->file_name).'" src="'.$img.'"/>';
	//Display product badge
	echo var_dump($this->row->badges);
	if($this->params->get('display_badges', 1)) {
		$this->classbadge->placeBadges($this->image, $this->row->badges, -10, 0);
	}
?>
				<figcaption class="meta_monaco_product_name">

					<?php echo $this->row->product_name; ?>

				</figcaption>
				<button class="readmore">
					<?php echo '<i class="fa fa-search" aria-hidden="true"></i>'; ?>
				</button>
				<?php if($haveLink) { ?>
	</a>
	<?php } ?>
	</figure>

</div>
