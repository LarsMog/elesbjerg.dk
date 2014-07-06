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

jimport('joomla.application.component.controllerform');

/**
 * Medlem controller class.
 */
class Ehl_membersControllerMedlem extends JControllerForm
{

    function __construct() {
        $this->view_list = 'medlems';
        parent::__construct();
    }

}