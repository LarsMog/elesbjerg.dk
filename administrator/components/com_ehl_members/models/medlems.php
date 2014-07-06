<?php

/**
 * @version     1.0.0
 * @package     com_ehl_members
 * @copyright   Copyright (C) 2014. Alle rettigheder forbeholdes.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.net> - http://www.webitall.dk
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Ehl_members records.
 */
class Ehl_membersModelMedlems extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'name', 'a.name',
                'address', 'a.address',
                'zip', 'a.zip',
                'city', 'a.city',
                'phone', 'a.phone',
                'mobile', 'a.mobile',
                'workphone', 'a.workphone',
                'email', 'a.email',
                'email2', 'a.email2',
                'doublemember', 'a.doublemember',
                'gender', 'a.gender',
                'created', 'a.created',
                'birthyear', 'a.birthyear',
                'coname', 'a.coname',
                'memberstatus', 'a.memberstatus',
                'placename', 'a.placename',
                'postbox', 'a.postbox',
                'education', 'a.education',
                'job', 'a.job',
                'union1', 'a.union1',
                'affiliations', 'a.affiliations',
                'union2', 'a.union2',
                'affiliations_outside', 'a.affiliations_outside',
                'materal', 'a.materal',
                'localnotes', 'a.localnotes',
                'localnotes2', 'a.localnotes2',
                'updated', 'a.updated',

            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     */
    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);

        
		//Filtering name
		$this->setState('filter.name', $app->getUserStateFromRequest($this->context.'.filter.name', 'filter_name', '', 'string'));

		//Filtering address
		$this->setState('filter.address', $app->getUserStateFromRequest($this->context.'.filter.address', 'filter_address', '', 'string'));

		//Filtering zip
		$this->setState('filter.zip', $app->getUserStateFromRequest($this->context.'.filter.zip', 'filter_zip', '', 'string'));

		//Filtering city
		$this->setState('filter.city', $app->getUserStateFromRequest($this->context.'.filter.city', 'filter_city', '', 'string'));

		//Filtering phone
		$this->setState('filter.phone', $app->getUserStateFromRequest($this->context.'.filter.phone', 'filter_phone', '', 'string'));

		//Filtering mobile
		$this->setState('filter.mobile', $app->getUserStateFromRequest($this->context.'.filter.mobile', 'filter_mobile', '', 'string'));

		//Filtering email
		$this->setState('filter.email', $app->getUserStateFromRequest($this->context.'.filter.email', 'filter_email', '', 'string'));


        // Load the parameters.
        $params = JComponentHelper::getParams('com_ehl_members');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.name', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('filter.search');
        $id.= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );
        $query->from('`#__ehl_members` AS a');

        
		// Join over the users for the checked out user
		$query->select("uc.name AS editor");
		$query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

        

		// Filter by published state
		$published = $this->getState('filter.state');
		if (is_numeric($published)) {
			$query->where('a.state = ' . (int) $published);
		} else if ($published === '') {
			$query->where('(a.state IN (0, 1))');
		}

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.name LIKE '.$search.'  OR  a.address LIKE '.$search.'  OR  a.zip LIKE '.$search.'  OR  a.city LIKE '.$search.'  OR  a.phone LIKE '.$search.'  OR  a.mobile LIKE '.$search.'  OR  a.email LIKE '.$search.' )');
            }
        }

        

		//Filtering name

		//Filtering address

		//Filtering zip

		//Filtering city

		//Filtering phone

		//Filtering mobile

		//Filtering email


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
