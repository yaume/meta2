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
?>
<picture  itemprop="image" >
	<?php
	$img='images/meta_monaco_products/'.$img_link .'/'.$img_link
	?>
	<source 
	sizes="(max-width: 991px) 100vw, 40vw"
	srcset="
		<?php echo $img .'-150.webp'; ?> 150w,
		<?php echo $img .'-400.webp'; ?> 400w,
		<?php echo $img .'-710.webp'; ?> 710w,
		<?php echo $img .'-1064.webp'; ?> 1064w" 
		type="image/webp">
	<source sizes="(max-width: 991px) 90vw, 45vw" srcset="
		<?php echo $img .'-150.jpg'; ?> 150w,
		<?php echo $img .'-400.jpg'; ?> 400w,
		<?php echo $img .'-710.jpg'; ?> 710w,
		<?php echo $img .'-1064.jpg'; ?> 1064w">

	<img src="<?php echo $img .'-1064.jpg'; ?>" alt="<?php echo 'Photo of ' . $prod_name . ' by META Monaco Jewelry Designers';?>" title="<?php echo 'META Monaco\'s ' . $prod_name . ' fine jewelry from Monte-Carlo';?>" class="img-fluid"
		id="photo-full" />
</picture>
<?php
		if (isset($this->element->images[1])){
		foreach( $this->element->images as $image) {
			$img_link=$this->element->product_code;
			$img=str_replace('-710.jpg','',$image->file_path);
			$alt=$image->file_name;
			$title=$image->file_description;
			$imgl='images/meta_monaco_products/'.$img_link .'/'.$img;
			?>
<picture itemprop="thumbnail">
	<source sizes="(max-width: 991px) 32vw, 14vw"
	srcset="
		<?php echo $imgl.'-150.webp'; ?> 180w,
		<?php echo $imgl.'-400.webp'; ?> 400w,
		<?php echo $imgl.'-710.webp'; ?> 710w"
	type="image/webp">
	<source sizes="(max-width: 991px) 32vw, 14vw"
	srcset="
		<?php echo $imgl.'-150.jpg'; ?> 180w,
		<?php echo $imgl.'-400.jpg'; ?> 400w,
		<?php echo $imgl.'-710.jpg'; ?> 710w"
	>
	<img src="<?php echo $imgl.'-710.jpg'; ?>"
		alt="<?php echo 'Photo of ' . $prod_name . ' by META Monaco Jewelry Designers';?>" title="<?php echo 'META Monaco\'s ' . $prod_name . ' fine jewelry from Monte-Carlo';?>" class="img-fluid thumbs" />
</picture>
<?php
	}  
	// foreach($this->element->images as $image) {
	// ?>

<script>
	jQuery(document).ready(function ($) {
		$('.thumbs').click(function () {
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