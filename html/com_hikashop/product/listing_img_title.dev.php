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
<div class="meta_monaco_listing">
	<?php if($haveLink) { ?>
	<a href="<?php echo $link;?>" title="<?php echo $this->escape($this->row->product_name); ?>">
		<?php } ?>
		<figure>
			<?php
	$img = 'images/meta_monaco_products/'.$this->row->product_code.'/'.$this->row->product_code.'-1064.jpg';
		echo '<img class="meta_monaco_product_listing_image img-fluid" title="'.$this->escape(@$this->row->file_description).'" alt="'.$this->escape(@$this->row->file_name).'" src="'.$img.'"/>';
	//Display product badge

	if($this->params->get('display_badges', 1)) {
		$badge = $this->row->badges[0];
		if($badge){
		// $this->classbadge->placeBadges($this->image, $this->row->badges, -10, 0);
		?>
			<div class="badge">
				<p>
					<?php echo $badge->badge_name;?>
				</p>
			</div>
			<?php }}
?>
			<figcaption class="meta_monaco_product_name">

				<?php echo $this->row->product_name; ?>

			</figcaption>
			<?php if($haveLink) { ?>
	</a>
	<?php }	?>
	<div class="buttons">
		<?php if($haveLink) { ?>
		<a href="<?php echo $link;?>" title="<?php echo $this->escape($this->row->product_name); ?>">
			<?php } ?>
			<button class="btn readmore"
				aria-label="Find out more about <?php echo $this->row->product_name; ?>">
				Details <?php echo '<i class="fa fa-2x fa-search" aria-hidden="true"></i>'; ?>
			</button>
			<?php if($haveLink) { ?>
		</a>
		<?php }	?>
		<?php
						if($this->params->get('add_to_cart') || $this->params->get('add_to_wishlist')) { ?>
		<button class="btn buynow"
			aria-label="Find out more about <?php echo $this->row->product_name; ?>" data-toggle="modal"
			data-target="#<?php echo $this->row->product_id;?>">
			Add to cart <?php echo '<i class="fa fa-2x fa-add_cart" aria-hidden="true"></i>'; ?>
		</button>
	</div>
	</figure>
	<?php } ?>
		<div class="modal" tabindex="-1" role="dialog" id="<?php echo $this->row->product_id;?>">	
			<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<!-- ADD TO CART BUTTON AREA -->
								<?php
									if($this->params->get('add_to_cart') || $this->params->get('add_to_wishlist')) {
										$this->setLayout('add_to_cart_listing');
										echo $this->loadTemplate();
									}
									?>
								<!-- EO ADD TO CART BUTTON AREA -->
					</div>
				</div>
			</div>
		</div>
</div>