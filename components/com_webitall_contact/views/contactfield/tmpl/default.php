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
?>

<?php if( $this->item ) : ?>

    <div class="item_fields">
        
        <ul class="fields_list">

        
        
            <li><?php echo 'id'; ?>: 
            <?php echo $this->item->id; ?></li>

        
        
            <li><?php echo 'ordering'; ?>: 
            <?php echo $this->item->ordering; ?></li>

        
        
            <li><?php echo 'state'; ?>: 
            <?php echo $this->item->state; ?></li>

        
        
            <li><?php echo 'checked_out'; ?>: 
            <?php echo $this->item->checked_out; ?></li>

        
        
            <li><?php echo 'checked_out_time'; ?>: 
            <?php echo $this->item->checked_out_time; ?></li>

        
        
            <li><?php echo 'created_by'; ?>: 
            <?php echo $this->item->created_by; ?></li>

        
        
            <li><?php echo 'name'; ?>: 
            <?php echo $this->item->name; ?></li>

        
        
            <li><?php echo 'label'; ?>: 
            <?php echo $this->item->label; ?></li>

        
        
            <li><?php echo 'required'; ?>: 
            <?php echo $this->item->required; ?></li>

        
        
            <li><?php echo 'type'; ?>: 
            <?php echo $this->item->type; ?></li>

        
        
            <li><?php echo 'options'; ?>: 
            <?php echo $this->item->options; ?></li>

        

        </ul>
        
    </div>
    <?php if(JFactory::getUser()->authorise('core.edit', 'com_webitall_contact.contactfield'.$this->item->id)): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_webitall_contact&task=contactfield.edit&id='.$this->item->id); ?>">Edit</a>
	<?php endif; ?>
<?php else: ?>
    Could not load the item
<?php endif; ?>
