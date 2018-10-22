<?php
/*------------------------------------------------------------------------

# Meta Extension

# ------------------------------------------------------------------------

# author    Guillaume

# copyright Copyright (C) 2018 meta.mc. All Rights Reserved.

# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

# Websites: http://meta.mc

-------------------------------------------------------------------------*/

defined('_JEXEC') or die;
JFactory::getLanguage()->load('com_contact');

?>
<?php if ($params->get('show_email_form', 1)): ?>
    <div class="oe-foot-content">
        <form
            method="post"
            action="<?php echo JRoute::_('index.php'); ?>"
            id="contact-form<?php echo $module->id ?>">
            <div class="row">

                <div class="form-group col-sm-4">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_DESC'); ?>"
                        class="hasTip required sr-only"
                        for="form_contact_name" id="form_contact_name-lbl">
                        <?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'); ?>
                        <span class="star">&nbsp;*</span>
                    </label>
                    <input type="text"
                           aria-required="true"
                           required="required" size="30"
                           class="required form-control input-lg"
                           value=""
                           id="form_contact_name"
                           name="form[contact_name]"
                           placeholder="<?php echo JText::_('MOD_CONTACT_EMAIL_NAME_LABEL'); ?>">
                </div>

                <div class="form-group col-sm-4">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_EMAIL_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_EMAIL_DESC'); ?>"
                        class="hasTip required sr-only"
                        for="form_contact_email"
                        id="form_contact_email-lbl">
                        <?php echo JText::_('COM_CONTACT_EMAIL_LABEL'); ?><span class="star">&nbsp;*</span>
                    </label>
                    <input type="email"
                           aria-required="true"
                           required="required"
                           size="30" value=""
                           id="form_contact_email"
                           class="validate-email required form-control input-lg"
                           name="form[contact_email]"
                           placeholder="<?php echo JText::_('MOD_CONTACT_EMAIL_LABEL'); ?>">
                </div>

                <?php if ($params->get('show_subject', 1)): ?>
                    <div class="form-group col-sm-4">
                        <label
                            title="<?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_DESC'); ?>"
                            class="hasTip required sr-only"
                            for="form_contact_emailmsg"
                            id="form_contact_emailmsg-lbl">
                            <?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'); ?><span
                                class="star">&nbsp;*</span>
                        </label>
                        <input type="text"
                               aria-required="true"
                               required="required"
                               size="60"
                               class="required form-control input-lg"
                               value=""
                               id="form_contact_emailmsg"
                               name="form[contact_subject]"
                               placeholder="<?php echo JText::_('MOD_CONTACT_MESSAGE_SUBJECT_LABEL'); ?>">
                    </div>
                <?php endif; ?>

                <div class="form-group col-12">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_DESC'); ?>"
                        class="hasTip required sr-only" for="form_contact_message" id="form_contact_message-lbl">
                        <?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'); ?><span
                            class="star">&nbsp;*</span>
                    </label>
                    <textarea aria-required="true"
                              required="required"
                              class="required form-control"
                              rows="5"
                              style="width: 100%"
                              id="form_contact_message"
                              name="form[contact_message]"
                              placeholder="<?php echo JText::_('MOD_CONTACT_ENTER_MESSAGE_LABEL'); ?>"></textarea>
                </div>

                <!-- <?php if ($params->get('show_email_copy', 1)): ?>
                    <div class="form-group col-sm-4 col-12">
                        <label
                            title="<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_DESC'); ?>"
                            class="hasTip" for="jform_contact_email_copy"
                            id="form_contact_email_copy-lbl">
                            <?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_LABEL'); ?></label>
                        <input type="checkbox" value="1" id="form_contact_email_copy"
                               name="form[contact_email_copy]">
                    </div>
                <?php endif; ?> -->

                <?php if ($params->get('show_captcha', 1)): ?>
                    <?php JPluginHelper::importPlugin('captcha');
                    $dispatcher = JDispatcher::getInstance();
                    $dispatcher->trigger('onInit', 'dynamic_recaptcha_1'); ?>
                    <div id="dynamic_recaptcha_1"></div>
                <?php endif; ?>

                <div class="form-group col-12">

                    <a href="javascript:" class="btn meta-btn"
                            id="-contact-send">
                        <span><?php echo JText::_('MOD_CONTACT_SEND_LABEL'); ?></span>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                  
                </div>
                <div id="message-sent-false"><?php echo JText::_('JGLOBAL_VALIDATION_FORM_FAILED'); ?></div>
                <div id="message-sent"><?php echo JText::_('MOD_CONTACT_SENT_SUCCESSFULLY'); ?></div>
            </div>
        </form>
    </div>
<?php endif; ?>