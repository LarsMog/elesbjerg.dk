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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$lang = JFactory::getLanguage();
$lang->load( 'com_webitall_contact', JPATH_ADMINISTRATOR );

?>

<!-- Styling for making front end forms look OK -->
<!-- This should probably be moved to the template CSS file -->
<style>
    .front-end-edit ul {
        padding: 0 !important;
    }
    .front-end-edit li {
        list-style: none;
        margin-bottom: 6px !important;
    }
    .front-end-edit label {
        margin-right: 10px;
        display: block;
        float: left;
        width: 200px !important;
    }
    .front-end-edit .radio label {
        display: inline;
        float: none;
    }
    .front-end-edit .readonly {
        border: none !important;
        color: #666;
    }    
    .front-end-edit #editor-xtd-buttons {
        height: 50px;
        width: 600px;
        float: left;
    }
    .front-end-edit .toggle-editor {
        height: 50px;
        width: 120px;
        float: right;
        
    }
</style>

<div class="contactfield-edit front-end-edit">
    <h1>Edit <?php echo $this->item->id; ?></h1>

    <form id="form-contactfield" action="<?php echo JRoute::_('index.php?option=com_webitall_contact&task=contactfield.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
        <ul>
        
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
		<div>
			<button type="submit" class="validate"><span><?php echo JText::_('JSUBMIT'); ?></span></button>
			<?php echo JText::_('or'); ?>
			<a href="<?php echo JRoute::_('index.php?option=com_webitall_contact&task=contactfield.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

			<input type="hidden" name="option" value="com_webitall_contact" />
			<input type="hidden" name="task" value="contactfield.save" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>
