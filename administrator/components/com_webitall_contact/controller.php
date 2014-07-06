<?php
/**
 * @version     1.0.0
 * @package     com_webitall_contact
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.dk> - http://www.elesbjerg,dk
 */


// No direct access
defined('_JEXEC') or die;

class Webitall_contactController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable	If true, the view output will be cached
	 * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/webitall_contact.php';

		// Load the submenu.
		Webitall_contactHelper::addSubmenu(JRequest::getCmd('view', 'contactfields'));

		$view		= JRequest::getCmd('view', 'contactfields');
        JRequest::setVar('view', $view);

		parent::display();

		return $this;
	}
}
