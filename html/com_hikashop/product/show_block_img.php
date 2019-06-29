<?php
/**
 * @package	HikaShop for Joomla!
 * @version	4.0.0
 * @author	hikashop.com
 * @copyright	(C) 2010-2018 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
$first_img= $this->element->images[0];
$img_link=rtrim (preg_replace('/[0-9]+/', '',$this->element->product_code),'_');
$img=str_replace('-710.jpg','',$first_img->file_path);
$alt=$first_img->file_name;
$title=$first_img->file_description;
$prod_name = preg_replace('/<span class="hikashop_product_variant_subname">(.*?)<\/span>/','',$this->element->product_name);
// echo var_dump($this->element->product_name,$img_link);
?>
<img itemprop="image" sizes="(max-width: 991px) 100vw, 50vw"
srcset="images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-400.jpg 400w,
		images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-710.jpg 710w,
		images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-1064.jpg"
		src="images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-1064.jpg"
		alt="<?php if(! empty($alt)){ echo $alt;
					}else{ echo 'Photo of ' . $prod_name . ' by META Monaco Jewelry Designers';}?>"
		title="<?php if(! empty($title)){ echo $title;
					}else{ echo 'META Monaco\'s ' . $prod_name . ' fine jewelry from Monte-Carlo';}?>"  
		class="img-fluid"  id="photo-full"/>
		<?php
		if (isset($this->element->images[1])){
		foreach( $this->element->images as $image) {
			$img_link=$this->element->product_code;
			$img=str_replace('-710.jpg','',$image->file_path);
			$alt=$image->file_name;
			$title=$image->file_description;
			?>
			<img itemprop="thumbnail" sizes="(max-width: 991px) 30vw, 15vw"
			srcset="images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-150.jpg 150w,
					images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-400.jpg 400w,
					images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-710.jpg 710w"
			srcset-full="/images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-400.jpg 400w,
					/images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-710.jpg 710w,
					/images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-1064.jpg"
			src="images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-710.jpg"
			src-full="/images/meta_monaco_products/<?php echo $img_link .'/'.$img; ?>-1064.jpg"
			alt="<?php if(! empty($alt)){ echo $alt;
					}else{ echo 'Photo of ' . $prod_name . ' by META Monaco Jewelry Designers';}?>" 
			title="<?php if(! empty($title)){ echo $title;
					}else{ echo 'META Monaco\'s ' . $prod_name . ' fine jewelry from Monte-Carlo';}?>"
					class="img-fluid thumbs" />
<?php
	}  
	// foreach($this->element->images as $image) {
	// ?>

	<script>
	jQuery(document).ready(function($) {
  $('.thumbs').click(function() {
    var $src = $(this).attr('src-full');
    var $srcset = $(this).attr('srcset-full');
    var $alt = $(this).attr('alt');
	var $title = $(this).attr('title');
    $('#photo-full').attr('src', $src);
    $('#photo-full').attr('srcset', $srcset);
    $('#photo-full').attr('alt', $alt);
	$('#photo-full').attr('title', $title);
  });
});
	</script>
<?php }  	