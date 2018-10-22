<?php
/*------------------------------------------------------------------------

# Meta Extension

# ------------------------------------------------------------------------

# author    Guillaume

# copyright Copyright (C) 2018 meta.mc. All Rights Reserved.

# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

# Websites: http://meta.mc

-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die;
?>

<?php if ($params->get('show_email_form', 1)): ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#contact-send').click(function () {
                var mailtrue = /^([\w\-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
                    name = jQuery('#form_contact_name').val(),
                    namefrom = jQuery('#form_contact_email').val(),
                    message = jQuery('#form_contact_message').val();

                <?php if($params->get('show_subject', 1)):?>
                var subject = jQuery('#form_contact_emailmsg').val();
                <?php endif;?>

                if (!namefrom || !name.length || !message.length
                    <?php if($params->get('show_subject', 1)):?> || !subject.length <?php endif;?>) {
                    jQuery('#message-sent-false').fadeIn(1000, function () {
                        jQuery('#message-sent-false').html('<?php echo JText::_('VALIDATION_FORM_FAILED'); ?>').addClass('error-class');
                        jQuery('#message-sent-false').fadeOut(1000);
                    });
                    return false;
                } else if (mailtrue.test(namefrom) == false) {
                    jQuery('#message-sent-false').fadeIn(1000, function () {
                        jQuery('#message-sent-false').html('<?php echo JText::_('VALIDATION_EMAIL_FAILED');?>').addClass('error-class');
                        jQuery('#message-sent-false').fadeOut(1000);
                    });
                    return false;
                }
                var loading = jQuery('<div id="contact-loading"><\/div>');
                loading.insertAfter(jQuery('#contact-send'));
                jQuery.ajax({
                    type: 'post',
                    url: '<?php echo JUri::root() . 'modules/mod_contact/send.php'?>',
                    data: {
                        id: '<?php echo $contact->id . ':' . $contact->alias;?>',
                        contact_name: jQuery('#form_contact_name').val(),
                        contact_email: jQuery('#form_contact_email').val(),

                        <?php if($params->get('show_subject', 1)):?>
                        contact_subject: jQuery('#form_contact_emailmsg').val(),
                        <?php endif;?>

                        contact_message: jQuery('#form_contact_message').val(),
                        contact_email_copy: (jQuery('#form_contact_email_copy').attr('checked') ? 1 : 0),
                        error: '<?php echo base64_encode(JText::_('MOD_CONTACT_UNSUCCESSFUL'))?>',
                        recaptcha_response_field: jQuery('#recaptcha_response_field').attr('value'),
                        recaptcha_challenge_field: jQuery('#recaptcha_challenge_field').attr('value'),
                        "<?php echo JSession::getFormToken(); ?>": 1
                    }
                }).success(function (data) {

                    loading.remove();
                    if (data.length) {
                        var json = JSON.decode(data);

                        if (json['success'] == 1) {
                            jQuery('#message-sent').fadeIn(1200, function () {
                                jQuery('#message-sent').fadeOut(1200);
                                jQuery('#form_contact_name').val('');
                                jQuery('#form_contact_email').val('');

                                <?php if($params->get('show_subject', 1)):?>
                                jQuery('#form_contact_emailmsg').val('');
                                <?php endif;?>

                                jQuery('#form_contact_message').val('');
                                jQuery('#form_contact_email_copy').removeAttr('checked');
                            });
                        }
                        else {
                            jQuery('#message-sent-false').text(json['message']).fadeIn(1200, function () {
                                jQuery('#message-sent-false').fadeOut(1200);
                            });
                        }
                    }
                });
            });
        });
    </script>

<?php endif; ?>
<div id="contact-loading"></div>
<div class="contact">
    <h5><?php echo $module->title; ?></h5>
    <?php if ($contact->name && $params->get('show_name', 1)) : ?>
        <div class="page-header">
            <h2>
                <?php if ($contact->published == 0) : ?>
                    <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
                <?php endif; ?>
                <span class="contact-name"><?php echo $contact->name; ?></span>
            </h2>
        </div>
    <?php endif; ?>

    <?php if ($params->get('show_misc', 0)): ?>
        <?php if (!empty($contact->misc)): ?>
            <?php $class = null; ?>
            <?php if ($params->get('icon_misc')): ?>
                <?php $class = ' span6'; ?>
            <?php endif; ?>
            <div class="contact-miscinfo">
                <div class="info">
                <span class="contact-misc<?php echo $class; ?>">
                    <?php echo $contact->misc; ?>
                </span>
                </div>
                <div class="contact-icon<?php echo $class; ?>">
                <span class="<?php echo $params->get('marker_class'); ?>">
                <?php echo $params->get('marker_misc'); ?>
                </span>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php require JModuleHelper::getLayoutPath('mod_contact', '_form'); ?>

    <!--            --><?php //require JModuleHelper::getLayoutPath('mod_contact', '_address'); ?>

</div>