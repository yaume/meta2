<?php
/**
 * @package	HikaShop for Joomla!
 * @version	4.0.3
 * @author	hikashop.com
 * @copyright	(C) 2010-2019 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="meta_monaco_product_top_part" class="meta_monaco_product_top_part">

</div>
<div id="meta_monaco_product_left_part" class="meta_monaco_product_left_part">
	<?php if(!empty($this->element->extraData->leftBegin)) { echo implode("\r\n",$this->element->extraData->leftBegin); } ?>
	<?php
	$this->row =& $this->element;
	$this->setLayout('show_block_img');
	echo $this->loadTemplate();
	?>
	<?php if(!empty($this->element->extraData->leftEnd)) { echo implode("\r\n",$this->element->extraData->leftEnd); } ?>
</div>
<div id="meta_monaco_product_right_part" class="meta_monaco_product_right_part">
	<?php if(!empty($this->element->extraData->topBegin)) { echo implode("\r\n",$this->element->extraData->topBegin); } ?>
	<h1>
		<span id="meta_monaco_product_name_main" class="meta_monaco_product_name_main" itemprop="name">
			<?php
				if(hikashop_getCID('product_id') != $this->element->product_id && isset($this->element->main->product_name))
					echo $this->element->main->product_name;
				else
					echo $this->element->product_name;
			?></span>
		<?php if ($this->config->get('show_code')) { ?>
		<span id="meta_monaco_product_code_main" class="meta_monaco_product_code_main" itemprop="sku">
			<?php
				echo $this->element->product_code;
			?></span>
		<?php } ?>
	</h1>
	<?php if(!empty($this->element->extraData->topEnd)) { echo implode("\r\n", $this->element->extraData->topEnd); } ?>
				
	<h2><?php $this->setLayout('show_block_dimensions');
            echo $this->loadTemplate();
            ?>
	</h2>
	<?php
		$this->setLayout('show_block_social');
		echo $this->loadTemplate();
	?>
	<?php if(!empty($this->element->extraData->rightBegin)) { echo implode("\r\n",$this->element->extraData->rightBegin); } ?>
	<?php if($this->params->get('show_vote_product')) { ?>
	<div id="meta_monaco_product_vote_mini" class="meta_monaco_product_vote_mini">
		<?php
		$js = '';
		$this->params->set('vote_type', 'product');
		$this->params->set('vote_ref_id', isset($this->element->main) ? (int)$this->element->main->product_id : (int)$this->element->product_id );
		echo hikashop_getLayout('vote', 'mini', $this->params, $js);
	?>
	</div>
	<?php	}?>
	
	<meta itemprop="sku" content="<?php echo $this->element->product_code; ?>" />
	<?php if ($this->config->get('show_code')) { ?>
	<span id="hikashop_product_code_main" class="hikashop_product_code_main">
		<?php echo $this->element->product_code; ?>
	</span>


	<?php } ?>
	<?php if ($this->params->get('show_price')) { ?>
	<h3 itemprop="offers" itemtype="http://schema.org/offer" itemscope class="price">
		<span id="hikashop_product_price_main" class="hikashop_product_price_main">
			<?php
                if ($this->params->get('show_price')) {
                    $this->row = &$this->element;
                    $this->setLayout('listing_price');
                    echo $this->loadTemplate();
                }
                ?>
		</span>
	
	</h3>
	<?php } ?>
	<?php if (HIKASHOP_J30) {
            $this->setLayout('show_block_tags');
            echo $this->loadTemplate();
        } ?>


	<?php
if($this->params->get('characteristic_display') != 'list') {
	$this->setLayout('show_block_characteristic');
	echo $this->loadTemplate();
?>

	<?php } ?>

	<?php
$form = ',0';
if(!$this->config->get('ajax_add_to_cart', 1)) {
	$form = ',\'hikashop_product_form\'';
}

if(hikashop_level(1) && !empty ($this->element->options)) {
?>
	<div id="meta_monaco_product_options" class="meta_monaco_product_options">
		<?php
		$this->setLayout('option');
		echo $this->loadTemplate();
	?>
	</div>

	<?php
	$form = ',\'hikashop_product_form\'';
	if($this->config->get('redirect_url_after_add_cart', 'stay_if_cart') == 'ask_user') {
?>
	<input type="hidden" name="popup" value="1"/>
	<?php
	}
}

if(!$this->params->get('catalogue') && ($this->config->get('display_add_to_cart_for_free_products') || ($this->config->get('display_add_to_wishlist_for_free_products', 1) && hikashop_level(1) && $this->params->get('add_to_wishlist') && $this->config->get('enable_wishlist', 1)) || !empty($this->element->prices))) {
	if(!empty($this->itemFields)) {
		$form = ',\'hikashop_product_form\'';

		if ($this->config->get('redirect_url_after_add_cart', 'stay_if_cart') == 'ask_user') {
?>
	<input type="hidden" name="popup" value="1"/>
	<?php
		}

		$this->setLayout('show_block_custom_item');
		echo $this->loadTemplate();
	}
}

$this->formName = $form;
if($this->params->get('show_price')) {
?>
	<span id="meta_monaco_product_price_with_options_main" class="meta_monaco_product_price_with_options_main">
	</span>
	<?php
}

if(empty($this->element->characteristics) || $this->params->get('characteristic_display') != 'list') {
?>
	<div id="meta_monaco_product_quantity_main" class="meta_monaco_product_quantity_main">
		<?php
		$this->row =& $this->element;
		$this->ajax = 'if(hikashopCheckChangeForm(\'item\',\'hikashop_product_form\')){ return hikashopModifyQuantity(\'' . (int)$this->element->product_id . '\',field,1' . $form . ',\'cart\'); } else { return false; }';
		$this->setLayout('quantity');
		echo $this->loadTemplate();
	?>
	</div>
	<?php
}
?>

	<div id="meta_monaco_product_contact_main" class="meta_monaco_product_contact_main"><?php
$contact = (int)$this->config->get('product_contact', 0);
if(hikashop_level(1) && ($contact == 2 || ($contact == 1 && !empty($this->element->product_contact)))) {
	$css_button = $this->config->get('css_button', 'hikabtn');
?>
		<a href="<?php echo hikashop_completeLink('product&task=contact&cid=' . (int)$this->element->product_id . $this->url_itemid); ?>"
			class="<?php echo $css_button; ?>">
			<?php
			echo JText::_('CONTACT_US_FOR_INFO');
		?></a>
		<?php
}
?>
	</div>

	<?php
if(!empty($this->fields)) {
	$this->setLayout('show_block_custom_main');
	echo $this->loadTemplate();
}

?>
	<span id="meta_monaco_product_id_main" class="meta_monaco_product_id_main">
		<input type="hidden" name="product_id" value="<?php echo (int)$this->element->product_id; ?>" />
	</span>

	<?php if(!empty($this->element->extraData->rightEnd)) { echo implode("\r\n",$this->element->extraData->rightEnd); } ?>
	<div class="accordion" id="description">
		<div class="card">
			<div class="card-header" id="description-header">
				<h3 class="mb-0"><a data-toggle="collapse" href="#meta_monaco_product_description_main" role="button"
						aria-expanded="false" aria-controls="meta_monaco_product_description_main"
						class="meta_description collapsed">
						Description <i class="fa fa-caret"></i>
					</a></h3>
			</div>
			<div id="meta_monaco_product_description_main" class="meta_monaco_product_description_main collapse" itemprop="description">
				<div class="card-body">
					<?php echo JHTML::_('content.prepare',preg_replace('#<hr *id="system-readmore" */>#i','',$this->element->product_description));?>
			</div>
			</div>
		</div>
	</div>
</div>


<div id="meta_monaco_product_bottom_part" class="meta_monaco_product_bottom_part">

	<?php if(!empty($this->element->extraData->bottomBegin)) { echo implode("\r\n",$this->element->extraData->bottomBegin); } ?>


	<span id="meta_monaco_product_url_main" class="meta_monaco_product_url_main">
		<?php
		if(!empty($this->element->product_url)) {
			echo JText::sprintf('MANUFACTURER_URL', '<a href="' . $this->element->product_url . '" target="_blank">' . $this->element->product_url . '</a>');
		}
	?></span>

	<?php
	$this->setLayout('show_block_product_files');
	echo $this->loadTemplate();
?>

	<?php if(!empty($this->element->extraData->bottomMiddle)) { echo implode("\r\n",$this->element->extraData->bottomMiddle); } ?>
	<?php if(!empty($this->element->extraData->bottomEnd)) { echo implode("\r\n",$this->element->extraData->bottomEnd); } ?>
</div>