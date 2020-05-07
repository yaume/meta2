<?php
/**
 * @package	HikaShop for Joomla!
 * @version	4.0.0
 * @author	hikashop.com
 * @copyright	(C) 2010-2018 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><?php
if(!$this->module && isset($this->element->category_canonical) && !empty($this->element->category_canonical)) {
	$canonicalUrl = hikashop_cleanURL($this->element->category_canonical);

	$doc = JFactory::getDocument();
	$doc->addCustomTag( '<link rel="canonical" href="'.$canonicalUrl.'" />' );
}

if(!empty($this->tmpl_ajax)) {
	$this->setLayout('listing');
	$layout_type = $this->params->get('layout_type');
	echo $this->loadTemplate($layout_type);
	return;
}

ob_start();
$title_key = 'show_page_heading';
$titleType = 'h1';
if($this->module) {
	$title_key = 'showtitle';
	$titleType = 'h2';
}
$title = (string)$this->params->get($title_key, '');
if((!$this->module || hikaInput::get()->getVar('hikashop_front_end_main', 0)) && $title_key == 'show_page_heading' && $title === '') {
	$params = JComponentHelper::getParams('com_menus');
	$title = $params->get('show_page_heading');
}

if(!empty($title) && hikaInput::get()->getVar('hikashop_front_end_main', 0) && (!$this->module || $this->pageInfo->elements->total)) {
	$name = $this->params->get('page_title');
	if($this->module) {
		$name = $this->params->get('title');
	} elseif($this->params->get('page_heading')) {
		$name = $this->params->get('page_heading');
	}
?>
	<<?php echo $titleType; ?>>
	<?php echo $name; ?>
	</<?php echo $titleType; ?>>
<?php
}

if(($this->params->get('show_image') && !empty($this->element->file_path)) || ($this->params->get('show_description', !$this->module) && !empty($this->element->category_description))) {
?>
		<div class="hikashop_category_description">
<?php
	if($this->params->get('show_image') && !empty($this->element->file_path)){
		jimport('joomla.filesystem.file');
		if(JFile::exists($this->image->getPath($this->element->file_path,false))){
?>
			<img src="<?php echo $this->image->getPath($this->element->file_path); ?>" class="hikashop_category_image" title="<?php echo $this->escape(@$this->element->file_description); ?>" alt="<?php echo $this->escape(@$this->element->file_name); ?>"/>
<?php
		}
	}
	if($this->params->get('show_description',!$this->module)&&!empty($this->element->category_description)){
?>
			<div class="hikashop_category_description_content"><?php
				echo JHTML::_('content.prepare',$this->element->category_description);
			?></div>
<?php
	}
?>
		</div>
<?php
}

if(!empty($this->fields)) {
	ob_start();
	$this->fieldsClass->prefix = '';
	foreach($this->fields as $fieldName => $oneExtraField) {
		if(!empty($this->element->$fieldName)) {
?>
			<tr class="hikashop_category_custom_<?php echo $oneExtraField->field_namekey;?>_line">
				<td class="key">
					<span id="hikashop_category_custom_name_<?php echo $oneExtraField->field_id;?>" class="hikashop_category_custom_name">
						<?php echo $this->fieldsClass->getFieldName($oneExtraField);?>
					</span>
				</td>
				<td>
					<span id="hikashop_category_custom_value_<?php echo $oneExtraField->field_id;?>" class="hikashop_category_custom_value">
						<?php echo $this->fieldsClass->show($oneExtraField,$this->element->$fieldName); ?>
					</span>
				</td>
			</tr>
<?php
		}
	}
	$custom_fields_html = ob_get_clean();
	if(!empty($custom_fields_html)) {
?>
		<div id="hikashop_category_custom_info_main" class="hikashop_category_custom_info_main">
			<h4><?php echo JText::_('CATEGORY_ADDITIONAL_INFORMATION');?></h4>
			<table class="hikashop_category_custom_info_main">
				<?php echo $custom_fields_html; ?>
			</table>
		</div>
<?php
	}
}

$mainInfo = ob_get_clean();
ob_start();

$display_filters = (int)$this->params->get('display_filters', -1);
if($display_filters == -1) {
	$config =& hikashop_config();
	$display_filters = (int)$config->get('show_filters');
}
if(hikashop_level(2) && hikaInput::get()->getVar('hikashop_front_end_main', 0) && (hikaInput::get()->getVar('task','listing')=='listing' || !empty($this->force_display_filter)) && $display_filters == 1) {
	$this->setLayout('filter');
	$htmlFilter = $this->loadTemplate();
}
$task = hikaInput::get()->getCmd('task', '');
$ctrl = hikaInput::get()->getCmd('ctrl', '');

if(!empty($htmlFilter) && $ctrl != 'category'){
	echo $htmlFilter;
}
$filter_type = (int)$this->params->get('filter_type');
$layout_type = $this->params->get('layout_type');
if(empty($layout_type))
	$layout_type = 'div';

if($filter_type !== 3) {
	$this->setLayout('listing');
	$html = $this->loadTemplate($layout_type);
	if(!$this->module)
		echo $mainInfo;
	if(!empty($html)){
		if($this->module) echo $mainInfo;
		if(!empty($htmlFilter) && $ctrl == 'category')
			echo $htmlFilter;
?>

<?php
		if(hikaInput::get()->getVar('hikashop_front_end_main',0) && hikaInput::get()->getVar('task') == 'listing' && $this->params->get('show_compare')) {
			$css_button = $this->config->get('css_button', 'hikabtn');
			$css_button_compare = $this->config->get('css_button_compare', 'hikabtn-compare');
?>
			<div id="hikashop_compare_zone" class="hikashop_compare_zone">
				<a class="<?php echo $css_button . ' ' . $css_button_compare; ?>" id="hikashop_compare_button" style="display:none;" href="#" data-compare-href="<?php echo hikashop_completeLink('product&task=compare'.$this->itemid, false, true); ?>" onclick="if(window.hikashop.compareProducts) { return window.hikashop.compareProducts(this); }"><span><?php
					echo JText::_('COMPARE_PRODUCTS');
				?></span></a>
			</div>
<?php
		}
		echo $html;
?>

<?php
	} elseif(( !$this->module || hikaInput::get()->getVar('hikashop_front_end_main',0) ) && ($ctrl == 'product'  || $ctrl == 'category') && $task == 'listing' && !empty($this->filters) && count($this->filters) && !empty($this->filter_set)) {
		if(!empty($htmlFilter))
			echo $htmlFilter;
		echo JText::_('HIKASHOP_NO_RESULT');
	}

	$html = ob_get_clean();
	if(!empty($html)) {
?>
	<?php
echo $html; ?>
<?php
	}
} else if(!empty($this->rows) && !empty($this->categories)) {

	if(!$this->module)
		echo $mainInfo;

	$allrows = $this->rows;

	$pagination = '';
	if((!$this->module || hikaInput::get()->getVar('hikashop_front_end_main',0)) && $this->pageInfo->elements->total) {
		$pagination = $this->config->get('pagination','bottom');
		$this->config->set('pagination', '');
	}

	if((!empty($allrows) || !$this->module || hikaInput::get()->getVar('hikashop_front_end_main',0)) && in_array($pagination, array('top','both')) && $this->params->get('show_limit') && $this->pageInfo->elements->total) {
		$this->pagination->form = '_top';
?>
	<form action="<?php echo hikashop_currentURL(); ?>" method="post" name="adminForm_<?php echo $this->params->get('main_div_name').$this->category_selected;?>_top">
		<div class="meta_monaco_products_pagination meta_monaco_products_pagination_top">
		<?php echo $this->pagination->getListFooter($this->params->get('limit')); ?>
		<span class="hikashop_results_counter"><?php echo $this->pagination->getResultsCounter(); ?></span>
		</div>
		<input type="hidden" name="filter_order_<?php echo $this->params->get('main_div_name').$this->category_selected;?>" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
		<input type="hidden" name="filter_order_Dir_<?php echo $this->params->get('main_div_name').$this->category_selected;?>" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
<?php
	}

	$main_div_name = $this->params->get('main_div_name');
	foreach($this->categories as $category) {
		if(empty($category['products']))
			continue;

		$this->rows = array();
		foreach($allrows as $p) {
			if(in_array($p->product_id, $category['products']))
				$this->rows[] = $p;
		}

		$this->params->set('main_div_name', $main_div_name.'_'.$category['category']->category_id);

		$this->setLayout('listing');
		$html = $this->loadTemplate($layout_type);
		if(!empty($html)) {
			if(!empty($htmlFilter) && $ctrl == 'category')
				echo $htmlFilter;
?>
	<!-- Remove category title -->
	<!-- <h2><?php echo $category['category']->category_name; ?></h2> -->
	
<?php
		if(hikaInput::get()->getVar('hikashop_front_end_main',0) && hikaInput::get()->getVar('task') == 'listing' && $this->params->get('show_compare')) {
			$css_button = $this->config->get('css_button', 'hikabtn');
			$css_button_compare = $this->config->get('css_button_compare', 'hikabtn-compare');
?>
			<div id="hikashop_compare_zone" class="hikashop_compare_zone">
				<a class="<?php echo $css_button . ' ' . $css_button_compare; ?>" id="hikashop_compare_button" style="display:none;" href="#" data-compare-href="<?php echo hikashop_completeLink('product&task=compare'.$this->itemid, false, true); ?>" onclick="if(window.hikashop.compareProducts) { return window.hikashop.compareProducts(this); }"><span><?php
					echo JText::_('COMPARE_PRODUCTS');
				?></span></a>
			</div>
<?php
		}
		echo $html;
?>
	
<?php
		}
	}
	$this->params->set('main_div_name', $main_div_name);
	$this->config->set('pagination', $pagination);

	if((!empty($allrows) || !$this->module || hikaInput::get()->getVar('hikashop_front_end_main',0)) && in_array($pagination,array('bottom','both')) && $this->params->get('show_limit') && $this->pageInfo->elements->total) {
		$this->pagination->form = '_bottom';
?>
	<form action="<?php echo hikashop_currentURL(); ?>" method="post" name="adminForm_<?php echo $this->params->get('main_div_name').$this->category_selected;?>_bottom">
		<div class="meta_monaco_products_pagination meta_monaco_products_pagination_bottom">
		<?php echo $this->pagination->getListFooter($this->params->get('limit')); ?>
		<span class="hikashop_results_counter"><?php echo $this->pagination->getResultsCounter(); ?></span>
		</div>
		<input type="hidden" name="filter_order_<?php echo $this->params->get('main_div_name').$this->category_selected;?>" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
		<input type="hidden" name="filter_order_Dir_<?php echo $this->params->get('main_div_name').$this->category_selected;?>" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
<?php }

	$html = ob_get_clean();
	if(!empty($html)) {
?>
		<div id="<?php echo $this->params->get('main_div_name');?>" class="hikashop_category_information meta_monaco_products_listing_main hikashop_product_listing_<?php echo $this->element->category_id; ?>"><?php echo $html; ?></div>
<?php
	}
}

if(!$this->module){
?>
<div class="hikashop_submodules" style="clear:both">
<?php
	if(!empty($this->modules)){
		jimport('joomla.application.module.helper');
		foreach($this->modules as $module) {
			echo JModuleHelper::renderModule($module);
		}
	}
?>
</div>
<?php
}
