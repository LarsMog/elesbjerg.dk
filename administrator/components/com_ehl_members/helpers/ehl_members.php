<?php

/**
 * @version     1.0.0
 * @package     com_ehl_members
 * @copyright   Copyright (C) 2014. Alle rettigheder forbeholdes.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.net> - http://www.webitall.dk
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Ehl_members helper.
 */
class Ehl_membersBackendHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_EHL_MEMBERS_TITLE_MEDLEMS'),
			'index.php?option=com_ehl_members&view=medlems',
			$vName == 'medlems'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_EHL_MEMBERS_TITLE_UDVIKLINGS'),
			'index.php?option=com_ehl_members&view=udviklings',
			$vName == 'udviklings'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_ehl_members';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
