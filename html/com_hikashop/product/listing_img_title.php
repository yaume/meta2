<?php
/**
 * @package	HikaShop for Joomla!
 * @version	4.1.0
 * @author	hikashop.com
 * @copyright	(C) 2010-2019 HIKARI SOFTWARE. All rights reserved.
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
		<figure>
			<?php
				$img = 'images/meta_monaco_products/'.$this->row->product_code.'/'.$this->row->product_code.'-1064.jpg';
				echo '<img class="meta_monaco_product_listing_image img-fluid" title="'.$this->escape(@$this->row->file_description).'" alt="'.$this->escape(@$this->row->file_name).'" src="'.$img.'"/>';
				//Display product badge

					if($this->params->get('display_badges', 1)) {
						$badge = $this->row->badges[0];
						if($badge){
							?>
							<div class="badge">
								<p>
									<?php echo $badge->badge_name;?>
								</p>
							</div>
							<?php 
						}
					}
			?>		
			<figcaption class="meta_monaco_product_name">
				<!-- PRODUCT NAME -->
				<?php echo $this->row->product_name; ?>
				<meta itemprop="name" content="<?php echo $this->row->product_name; ?>">
				<!-- EO PRODUCT NAME -->
			</figcaption>
	<!-- BUTTONS AREA -->
	<div class="buttons">
		<!-- PRODUCT DETAILS BUTTON AREA -->
		<?php
			$details_button = (int)$this->params->get('details_button', 0);
			if($details_button) {
				// $css_button = $this->config->get('css_button', 'hikabtn');
				$css_button =" btn readmore";
		?>
		<a href="<?php echo $link; ?>" class="<?php echo $css_button; ?>"><?php	echo JText::_('PRODUCT_DETAILS');?>
		</a>
		<?php }	?>
		<meta itemprop="url" content="<?php echo $link; ?>">
		<!-- EO PRODUCT DETAILS BUTTON AREA -->
		<!-- ADD TO CART BUTTON AREA -->
		<?php
			if($this->params->get('add_to_cart') || $this->params->get('add_to_wishlist')) {
				$this->setLayout('add_to_cart_listing');
				echo $this->loadTemplate();
			}
		?>
	</div>
		<!-- EO BUTTONS AREA -->

		<!-- PRODUCT PRICE -->
		<?php
	if($this->params->get('show_price','-1')=='-1'){
		$config =& hikashop_config();
		$this->params->set('show_price',$config->get('show_price'));
	}
	if($this->params->get('show_price')){
		$this->setLayout('listing_price');
		echo $this->loadTemplate();
	}
?>
		<!-- EO PRODUCT PRICE -->
		<!-- PRODUCT CODE -->
		<span class='hikashop_product_code_list'>
			<?php if ($this->config->get('show_code')) { ?>
			<?php if($haveLink) { ?>
			<a href="<?php echo $link;?>">
				<?php } ?>
				<?php echo $this->row->product_code; ?>
				<?php if($haveLink) { ?>
			</a>
			<?php } ?>
			<?php } ?>
		</span>
		<!-- EO PRODUCT CODE -->

		<!-- PRODUCT CUSTOM FIELDS -->
		<?php
if(!empty($this->productFields)) {
	foreach($this->productFields as $fieldName => $oneExtraField) {
		if(empty($this->row->$fieldName) && (!isset($this->row->$fieldName) || $this->row->$fieldName !== '0'))
			continue;

		if(!empty($oneExtraField->field_products)) {
			$field_products = is_string($oneExtraField->field_products) ? explode(',', trim($oneExtraField->field_products, ',')) : $oneExtraField->field_products;
			if(!in_array($this->row->product_id, $field_products))
				continue;
		}
?>
		<dl class="hikashop_product_custom_<?php echo $oneExtraField->field_namekey;?>_line">
			<dt class="hikashop_product_custom_name">
				<?php echo $this->fieldsClass->getFieldName($oneExtraField);?>
			</dt>
			<dd class="hikashop_product_custom_value">
				<?php echo $this->fieldsClass->show($oneExtraField,$this->row->$fieldName); ?>
			</dd>
		</dl>
		<?php
	}
}
?>
		<!-- EO PRODUCT CUSTOM FIELDS -->

		<?php if(!empty($this->row->extraData->afterProductName)) { echo implode("\r\n",$this->row->extraData->afterProductName); } ?>

		<!-- PRODUCT VOTE -->
		<?php

if($this->params->get('show_vote')) {
	$this->setLayout('listing_vote');
	echo $this->loadTemplate();
}
?>
		<!-- EO PRODUCT VOTE -->

		<!-- COMPARISON AREA -->
		<?php
if(hikaInput::get()->getVar('hikashop_front_end_main', 0) && hikaInput::get()->getVar('task') == 'listing' && $this->params->get('show_compare')) {
	$css_button = $this->config->get('css_button', 'hikabtn');
	$css_button_compare = $this->config->get('css_button_compare', 'hikabtn-compare');
?>
		<br />
		<?php
	if((int)$this->params->get('show_compare') == 1) {
?>
		<a class="<?php echo $css_button . ' ' . $css_button_compare; ?>" href="<?php echo $link; ?>"
			onclick="if(window.hikashop.addToCompare) { return window.hikashop.addToCompare(this); }"
			data-addToCompare="<?php echo $this->row->product_id; ?>"
			data-product-name="<?php echo $this->escape($this->row->product_name); ?>"
			data-addTo-class="hika-compare"><span><?php
		echo JText::_('ADD_TO_COMPARE_LIST');
	?></span></a>
		<?php
	} else {
?>
		<label><input type="checkbox" class="hikashop_compare_checkbox"
				onchange="if(window.hikashop.addToCompare) { return window.hikashop.addToCompare(this); }"
				data-addToCompare="<?php echo $this->row->product_id; ?>"
				data-product-name="<?php echo $this->escape($this->row->product_name); ?>"
				data-addTo-class="hika-compare"><?php echo JText::_('ADD_TO_COMPARE_LIST'); ?></label>
		<?php
	}
}
?>
		<!-- EO COMPARISON AREA -->

		<!-- CONTACT US AREA -->
		<?php
	$contact = (int)$this->config->get('product_contact', 0);
	if(hikashop_level(1) && $this->params->get('product_contact_button', 0) && ($contact == 2 || ($contact == 1 && !empty($this->row->product_contact)))) {
		$css_button = $this->config->get('css_button', 'hikabtn');
?>
		<a href="<?php echo hikashop_completeLink('product&task=contact&cid=' . (int)$this->row->product_id . $this->itemid); ?>"
			class="<?php echo $css_button; ?>"><?php
		echo JText::_('CONTACT_US_FOR_INFO');
	?></a>
		<?php
	}
?>

		<!-- EO CONTACT US AREA -->


	<!-- </div> -->
	<?php
	if(!empty($this->row->extraData->bottom)) { echo implode("\r\n",$this->row->extraData->bottom); }

	if(isset($this->rows[0]) && $this->rows[0]->product_id == $this->row->product_id) {
		$css = '';
		if((int)$this->image->main_thumbnail_y>0){
			$css .= '
	#'.$mainDivName.' .hikashop_product_image { height:'.(int)$this->image->main_thumbnail_y.'px; }';
		}
		if((int)$this->image->main_thumbnail_x>0){
			$css .= '
	#'.$mainDivName.' .hikashop_product_image_subdiv { width:'.(int)$this->image->main_thumbnail_x.'px; }';
		}
		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration($css);
	}
	?>	
	</figure>
</div>