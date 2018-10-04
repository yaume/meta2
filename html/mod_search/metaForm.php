<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="search<?php echo $moduleclass_sfx ?> search-form col-12" id="searchForm">
    <form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-inline">
        <div class="search-box" id="searchBox">
            <?php
            $output = '';
            $output .= '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="search-input search-query form-control" type="text" size="' . $width . '"  placeholder="Start typing..." autocomplete="off"/>';
            if ($button) :
                if ($imagebutton) :
                    $btn_output = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
                else :
                    $btn_output = ' <button type button aria-label="Close" class="close" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
                endif;

                switch ($button_pos) :
                    case 'top' :
                        $output = $btn_output . '<br />' . $output;
                        break;

                    case 'bottom' :
                        $output .= '<br />' . $btn_output;
                        break;

                    case 'right' :
                        $output .= $btn_output;
                        break;

                    case 'left' :
                    default :
                        $output = $btn_output . $output;
                        break;
                endswitch;

            endif;

            echo $output;
            ?>
            <button type="button" class="close" aria-label="Close" data-toggle="collapse" href="#searchForm">
  <span aria-hidden="true">&times;</span>
</button>
            
        </div>
        <input type="hidden" name="task" value="search"/>
        <input type="hidden" name="option" value="com_search"/>
        <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>"/>
    </form>
</div>
