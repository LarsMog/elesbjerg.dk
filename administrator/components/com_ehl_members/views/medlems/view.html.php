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

jimport('joomla.application.component.view');

/**
 * View class for a list of Ehl_members.
 */
class Ehl_membersViewMedlems extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			throw new Exception(implode("\n", $errors));
		}
        
		Ehl_membersBackendHelper::addSubmenu('medlems');
        
		$this->addToolbar();
        if( $this->getLayout() == 'map' ) {
			// vis google maps
            $db = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select('*')
				->from('#__ehl_members')
				->where('state=1');
			$db->setQuery($query);
			$this->items = $db->loadObjectList();
			$this->markers = ' var markers = [];';
			foreach( $this->items AS $res ) {
				if( $res->maps_latt AND $res->maps_lang ) {
					$info = '<div style="width: 195px;" id="content"><div id="siteNotice"></div><h3 id="firstHeading" class="firstHeading">'.$res->name.'</h3><div id="bodyContent"><p>'.$res->address.'<br>'.$res->zip.' '.$res->city.'</p></div></div>';
					$this->markers .= "var contentString".$res->id." = '".$info."';
								var myLatlng = new google.maps.LatLng(".$res->maps_latt.",".$res->maps_lang.");
								infowindow".$res->id." = new google.maps.InfoWindow({
									content: contentString".$res->id."
								});
								marker".$res->id." = new google.maps.Marker({
									position: myLatlng,
									map: map,
									title: '".$res->name."'
								 });
								 google.maps.event.addListener(marker".$res->id.", 'click', function() {
									infowindow".$res->id.".open(map,marker".$res->id.");
								 });
								 markers.push(marker".$res->id.");
								 ";
				}
			} 
			
			$document = JFactory::getDocument();
			$document->addScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyC00llTLBgiY7iTozwYCcs7UteU_vrDdcE&v=3.exp&sensor=false');
			$document->addStyleDeclaration('img {max-width: none !important;}'); 
		}
		else {
			$this->sidebar = JHtmlSidebar::render();
		}
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/ehl_members.php';

		$state	= $this->get('State');
		$canDo	= Ehl_membersBackendHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_EHL_MEMBERS_TITLE_MEDLEMS'), 'medlems.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/medlem';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
			    JToolBarHelper::addNew('medlem.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
			    JToolBarHelper::editList('medlem.edit','JTOOLBAR_EDIT');
		    }

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('medlems.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('medlems.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'medlems.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('medlems.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('medlems.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'medlems.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('medlems.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_ehl_members');
		}
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_ehl_members&view=medlems');
        
        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

        
	}
    
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.checked_out' => JText::_('COM_EHL_MEMBERS_MEDLEMS_CHECKED_OUT'),
		'a.checked_out_time' => JText::_('COM_EHL_MEMBERS_MEDLEMS_CHECKED_OUT_TIME'),
		'a.name' => JText::_('COM_EHL_MEMBERS_MEDLEMS_NAME'),
		'a.address' => JText::_('COM_EHL_MEMBERS_MEDLEMS_ADDRESS'),
		'a.zip' => JText::_('COM_EHL_MEMBERS_MEDLEMS_ZIP'),
		'a.city' => JText::_('COM_EHL_MEMBERS_MEDLEMS_CITY'),
		'a.phone' => JText::_('COM_EHL_MEMBERS_MEDLEMS_PHONE'),
		'a.mobile' => JText::_('COM_EHL_MEMBERS_MEDLEMS_MOBILE'),
		'a.email' => JText::_('COM_EHL_MEMBERS_MEDLEMS_EMAIL'),
		);
	}

    
}
