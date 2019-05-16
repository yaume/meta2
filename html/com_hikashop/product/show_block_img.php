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
// $variant_name = '';
// $variant_main = '_main';
// $display_mode = '';
// if(!empty($this->variant_name)) {
// 	$variant_name = $this->variant_name;
// 	if(substr($variant_name, 0, 1) != '_')
// 		$variant_name = '_' . $variant_name;
// 	$variant_main = $variant_name;
// 	$display_mode = 'display:none;';
// }
// ?>
 <?php
// if(!empty ($this->element->images)) {
// 	$image = reset($this->element->images);
// }
// $height = (int)$this->config->get('product_image_y');
// $width = (int)$this->config->get('product_image_x');
// if(empty($height)) $height = (int)$this->config->get('thumbnail_y');
// if(empty($width)) $width = (int)$this->config->get('thumbnail_x');
// $divWidth = $width;
// $divHeight = $height;
// $this->image->checkSize($divWidth, $divHeight, $image);
// if(!$this->config->get('thumbnail')) {
// 	if(!empty ($this->element->images)) {
// 		echo '<img itemprop="image" src="' . $this->image->uploadFolder_url . $image->file_path . '" alt="' . $image->file_name . '" id="hikashop_main_image" style="margin-top:10px;margin-bottom:10px;display:inline-block;vertical-align:middle" />';
// 	}
// } else {
// 	$style = '';
// 	if( !empty($this->element->images) && count($this->element->images) > 1 && !empty($height)) {
// 		$style = ' style="height:' . ($height + 20) . 'px;"';
// 	}
// 	$variant_name = isset($this->variant_name) ? $this->variant_name : '';
// ?>
 <?php
// echo'<pre>',var_dump(empty($this->img)),'</pre>';
// 	if($this->image->override) {
// 	// 	echo $this->image->display(@$image->file_path, true, @$image->file_name, 'id="hikashop_main_image'.$variant_name.'" itemprop="image" style="margin-top:10px;margin-bottom:10px;display:inline-block;vertical-align:middle"','id="hikashop_main_image_link"', $width, $height);
// 	// } else {
// 	// 	echo'<pre>',var_dump(empty($this->popup)),'</pre>';
// 	// 	if(empty($this->popup))
// 	// 		$this->popup = hikashop_get('helper.popup');
// 	// 	$image_options = array('default' => true,'forcesize'=>$this->config->get('image_force_size',true),'scale'=>$this->config->get('image_scale_mode','inside'));
// 	// 	$img = $this->image->getThumbnail(@$image->file_path, array('width' => $width, 'height' => $height), $image_options);
// 	// 	if(@$img->success) {
// 	// 		if($img->external)
// 	// 			$attributes .= ' width="'.$img->req_width.'" height="'.$img->req_height.'"';
// 	// 		$html = '<img id="hikashop_main_image'.$variant_name.'"class="img-fluid" title="'.$this->escape(@$image->file_description).'" alt="'.$this->escape(@$image->file_name).'" src="'.$img->url.'"/>';

// 	// 		if(!empty($this->element->badges))
// 	// 			$html .= $this->classbadge->placeBadges($this->image, $this->element->badges, '0', '0',false);

// 	// 		$attr = 'title="'.$this->escape(@$image->file_description).'" class="main-img"';
// 	// 		if (!empty ($this->element->images) && count($this->element->images) > 1)
// 	// 			$attr .= ' onclick="return window.localPage.openImage(\'hikashop_main_image'.$variant_name.'\', \''.$variant_name.'\', event);"';
// 	// 		echo $this->popup->image($html, $img->origin_url, null, $attr);
// 	// 	}
// 	}
// ?>
 <?php
// 	if(empty($this->variant_name) && !empty($img->origin_url)) {
// ?>
<!-- // <meta itemprop="image" content="<?php echo $img->origin_url; ?>" /> -->
 <?php
// 	}
// }
?>
<?php
	// if( !empty($this->element->images) && count($this->element->images) > 1) {
	// 	$firstThunb = true;
		// echo '<pre>', var_dump($this->element),'</pre>';
		foreach($this->element->images as $image) {
			$img_link=str_replace('-710','',$image->file_name);
			?>
			<img itemprop="image" sizes="(max-width: 991px) 100vw, 50vw"
			srcset="images/meta_monaco_products/<?php echo $img_link .'/'.$img_link; ?>-400.jpg 400w,
							images/meta_monaco_products/<?php echo $img_link .'/'.$img_link; ?>-710.jpg 710w,
							images/meta_monaco_products/<?php echo $img_link .'/'.$img_link; ?>-1064.jpg"
			src="images/meta_monaco_products/<?php echo $img_link .'/'.$img_link; ?>-1064.jpg"
			alt="Photo of <?php echo $this->element->product_name;?> by META Monaco Jewelry Designer" Title="META Monaco's <?php echo $this->element->product_name;?> fine jewelry from Monte-Carlo"  class="img-fluid" data-toggle="modal" data-target="#<?php echo $image->file_id?>"/>
      <!-- <img itemprop="image"  src="images/meta_monaco_products/<?php echo $img_link .'/'.$img_link.'-1064.jpg'; ?>" class="img-fluid" data-toggle="modal" data-target="#<?php echo $image->file_id?>"> -->
    <!-- </a> -->
<?php
	}  
	foreach($this->element->images as $image) {
	?>
	<div class="modal fade" id="<?php echo $image->file_id?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $image->file_id?>Label" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	<!-- <div class="modal-header">
        <h5 class="modal-title"><?php echo $image->file_name?></h5>
       
      </div> -->
      <div class="modal-body">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="images/meta_monaco_products/<?php echo $img_link.'/'.$img_link.'-1064.jpg'; ?>" class="img-fluid">
      </div>
	</div>
	</div>
	</div>
	<?php	
	
		}
	