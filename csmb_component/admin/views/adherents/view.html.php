<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorlds View
 */
class CsmbComponentViewAdherents extends JViewLegacy
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
        ContentHelper::addSubmenu('adherent');
        // Get data from the model
        $items      = $this->get('Items');
        $pagination = $this->get('Pagination');
        $filterForm    = $this->get('FilterForm');
        $activeFilters = $this->get('ActiveFilters');

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
        JToolBarHelper::title(JText::_('COM_CSMBCOMPONENT_MANAGER_ADHERENT'));
        JToolBarHelper::deleteList('', 'adherents.delete');
        JToolBarHelper::editList('adherent.edit');
        JToolBarHelper::addNew('adherent.add');
        JToolBarHelper::custom('adherents.reinit', 'unpublish', 'unpublish', 'COM_CSMBCOMPONENT_TOOLBAR_REINIT', true);
        JToolBarHelper::custom('adherents.toValidate', 'edit', 'edit', 'COM_CSMBCOMPONENT_TOOLBAR_EN_VALIDATION', true);
        JToolBarHelper::custom('adherents.validate', 'publish', 'publish', 'COM_CSMBCOMPONENT_TOOLBAR_VALIDATION', true);
        JToolBarHelper::custom('adherents.word', 'edit', 'edit', 'COM_CSMBCOMPONENT_TOOLBAR_WORD', true);
    }
    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_CSMBCOMPONENT_ADMINISTRATION_ADHERENT'));
    }
}