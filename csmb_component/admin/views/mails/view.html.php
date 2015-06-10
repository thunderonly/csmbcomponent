<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorlds View
 */
class CsmbComponentViewMails extends JViewLegacy
{
    /**
     * HelloWorlds view display method
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  mixed  A string if successful, otherwise a JError object.
     */
    function display($tpl = null)
    {
        ContentHelper::addSubmenu('mail');
        // Get data from the model
        $items      = $this->get('Items');
        $pagination = $this->get('Pagination');
        $filterForm    = $this->get('FilterForm');
        $activeFilters = $this->get('ActiveFilters');
        $state = $this->get('State');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }
        // Assign data to the view
        $this->items      = $items;
        $this->pagination = $pagination;
        $this->filterForm      = $filterForm;
        $this->activeFilters      = $activeFilters;
        $this->state = $state;

        // Set the toolbar
        $this->addToolBar();
        $this->sidebar = JHtmlSidebar::render();

        // Display the template
        parent::display($tpl);

        $this->setDocument();
    }

    /**
     * Setting the toolbar
     */
    protected function addToolBar()
    {

        JToolBarHelper::title(JText::_('COM_CSMBCOMPONENT_MANAGER_MAIL'));
        JToolBarHelper::deleteList('', 'mails.delete');
        JToolBarHelper::editList('mail.edit', 'Visualiser');
    }
    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_CSMBCOMPONENT_MAIL'));
    }
}