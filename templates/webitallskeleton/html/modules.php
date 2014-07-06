<?php  
/*------------------------------------------------------------------------
# author    Webitall ApS
# copyright Copyright © 2012 webitall. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.webitall.dk
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

function modChrome_slider($module, &$params, &$attribs) {
	echo JHtml::_('sliders.panel',JText::_($module->title),'module'.$module->id);
	echo $module->content;
}

function modChrome_boot($module, &$params, &$attribs) { ?>
	<div class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
			<h3><?php echo JText::_( $module->title ); ?></h3>
			<?php echo $module->content; ?>
	</div><?php
}

function modChrome_tabs($module, $params, $attribs)
{
	$area = isset($attribs['id']) ? (int) $attribs['id'] :'1';
	$area = 'area-'.$area;

	static $modulecount;
	static $modules;

	if ($modulecount < 1) {
		$modulecount = count(JModuleHelper::getModules($attribs['name']));
		$modules = array();
	}

	if ($modulecount == 1) {
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->title = $module->title;
		$temp->params = $module->params;
		$temp->id=$module->id;
		$modules[] = $temp;
		
		echo '<div id="'. $area.'" class="tabouter"><ul class="tabs">';

		foreach($modules as $rendermodule) {
			echo '<li class="tab"><a href="#" id="link_'.$rendermodule->id.'" class="linkopen" onclick="tabshow(\'module_'. $rendermodule->id.'\');return false">'.$rendermodule->title.'</a></li>';
		}
		echo '</ul>';
		$counter=0;

		foreach($modules as $rendermodule) {
			$counter ++;

			echo '<div tabindex="-1" class="tabcontent tabopen" id="module_'.$rendermodule->id.'">';
			echo $rendermodule->content;
			echo '</div>';
		}
		$modulecount--;
		echo '</div>';
	} else {
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->params = $module->params;
		$temp->title = $module->title;
		$temp->id = $module->id;
		$modules[] = $temp;
		$modulecount--;
	}
}


?>