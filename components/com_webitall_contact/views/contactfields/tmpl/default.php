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

<?php if($this->items) : ?>

    <div class="items">

        <ul class="items_list">

            <?php foreach ($this->items as $item) :?>
		<legend><?php echo $item->label;?>:</legend>
                <?php switch($item->type) {
		    case 'text':
		    case 'email':
			echo '<input type="text" name="'.$item->name.'" size="40">';
			break;
		    case 'textarea':
			echo '<textarea rows="'.$item->options.'" cols="50" name="'.$item->name.'"></textarea>';
			break;
                } ?>

            <?php endforeach; ?>
	<br><input type="submit" value="Send til Enhedslisten Esbjerg">
        </ul>

    </div>



<?php endif; ?>