<?php
/**
 * @version     1.0.0
 * @package     com_webitall_contact
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.dk> - http://www.elesbjerg,dk
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Contactfields list controller class.
 */
class Webitall_contactControllerContactfields extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'contactfield', $prefix = 'Webitall_contactModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}