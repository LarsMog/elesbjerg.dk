<?php
/**
 * sh404SEF - SEO extension for Joomla!
 *
 * @author      Yannick Gaultier
 * @copyright   (c) Yannick Gaultier 2014
 * @package     sh404SEF
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     4.4.0.1725
 * @date		2014-04-09
 */

// Security check to ensure this file is being included by a parent file.
if (!defined('_JEXEC'))
	die('Direct Access to this location is not allowed.');

?>
<div class="container-fluid">
<?php

// metadesc
$data = new stdClass();
$data->name = 'shAliasList';
$data->label = JText::_('COM_SH404SEF_ALIASES');
$data->input = '<textarea name="shAliasList" id="shAliasList" cols="51" rows="5">' . $this->aliases . '</textarea>';
$data->tip = JText::_('COM_SH404SEF_TT_ALIAS_LIST');
echo $this->layoutRenderer['custom']->render($data);

?>
</div>
