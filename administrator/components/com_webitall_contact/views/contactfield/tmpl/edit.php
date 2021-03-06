<?php
/**
 * @version     1.0.0
 * @package     com_webitall_contact
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.dk> - http://www.elesbjerg,dk
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_webitall_contact/assets/css/webitall_contact.css');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'contactfield.cancel' || document.formvalidator.isValid(document.id('contactfield-form'))) {
			Joomla.submitform(task, document.getElementById('contactfield-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_webitall_contact&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="contactfield-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_WEBITALL_CONTACT_LEGEND_CONTACTFIELD'); ?></legend>
			<ul class="adminformlist">

            
			<li><?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?></li>

            
			<li><?php echo $this->form->getLabel('created_by'); ?>
			<?php echo $this->form->getInput('created_by'); ?></li>

            
			<li><?php echo $this->form->getLabel('name'); ?>
			<?php echo $this->form->getInput('name'); ?></li>

            
			<li><?php echo $this->form->getLabel('label'); ?>
			<?php echo $this->form->getInput('label'); ?></li>

            
			<li><?php echo $this->form->getLabel('required'); ?>
			<?php echo $this->form->getInput('required'); ?></li>

            
			<li><?php echo $this->form->getLabel('type'); ?>
			<?php echo $this->form->getInput('type'); ?></li>

            
			<li><?php echo $this->form->getLabel('options'); ?>
			<?php echo $this->form->getInput('options'); ?></li>

            

            <li><?php echo $this->form->getLabel('state'); ?>
                    <?php echo $this->form->getInput('state'); ?></li><li><?php echo $this->form->getLabel('checked_out'); ?>
                    <?php echo $this->form->getInput('checked_out'); ?></li><li><?php echo $this->form->getLabel('checked_out_time'); ?>
                    <?php echo $this->form->getInput('checked_out_time'); ?></li>

            </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>