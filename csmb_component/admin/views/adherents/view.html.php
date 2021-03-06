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
        $form = $this->get('Form');
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
        $this->form = $form;
        $this->items      = $items;
        $this->pagination = $pagination;
        $this->filterForm      = $filterForm;
        $this->activeFilters      = $activeFilters;
        $this->state = $state;

        // Set the toolbar
        // Only set the toolbar if not modal
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
//        $user	= JFactory::getUser();
//        $user->authorise('core.edit', 'com_csmbcomponent')
        $canDo = JHelperContent::getActions('com_csmbcomponent', 'adherent');;
        $canDelete = $canDo->get('core.delete');
        $canCreate = $canDo->get('core.create');
        $canEdit = $canDo->get('core.edit');

        JToolBarHelper::title(JText::_('COM_CSMBCOMPONENT_MANAGER_ADHERENT'));
        if ($canDelete) {
            JToolBarHelper::deleteList('', 'adherents.delete');
        }
        if ($canCreate) {
            JToolBarHelper::addNew('adherent.add');
        }
        if ($canEdit) {
            JToolBarHelper::editList('adherent.edit');
            JToolBarHelper::custom('adherents.reinit', 'unpublish', 'unpublish', 'COM_CSMBCOMPONENT_TOOLBAR_REINIT', true);
            JToolBarHelper::custom('adherents.toValidate', 'edit', 'edit', 'COM_CSMBCOMPONENT_TOOLBAR_EN_VALIDATION', true);
            JToolBarHelper::custom('adherents.validate', 'publish', 'publish', 'COM_CSMBCOMPONENT_TOOLBAR_VALIDATION', true);
        }

        JToolBarHelper::custom('adherents.word', 'edit', 'edit', 'COM_CSMBCOMPONENT_TOOLBAR_WORD', true);

        $bar = JToolBar::getInstance('toolbar');
        JHtml::_('bootstrap.modal', 'collapseModal');
        $title = JText::_('JTOOLBAR_SEND_MAIL');

        // Instantiate a new JLayoutFile instance and render the batch button
        $layout = new JLayoutFile('joomla.toolbar.batch');

        $dhtml = $layout->render(array('title' => $title));
        $bar->appendButton('Custom', $dhtml, 'sendEmail');

        $title2 = JText::_('JTOOLBAR_CHANGE_SAISON');
        $layout2 = new JLayoutFile('saison', 'components/com_csmbcomponent/layout/');

        $dhtml2 = $layout2->render(array('title' => $title2));
        $bar->appendButton('Custom', $dhtml2, 'saison');

        $titleAttestation = JText::_('JTOOLBAR_ATTESTATION');
        $layoutAttestation = new JLayoutFile('attestation', 'components/com_csmbcomponent/layout/');
        $dhtmlAttestation = $layoutAttestation->render(array('title' => $titleAttestation));
        $bar->appendButton('Custom', $dhtmlAttestation, 'attestation');
    }

    protected function addModalToolBar() {

        JToolBarHelper::custom('mails.select', 'edit', 'edit', 'COM_CSMBCOMPONENT_TOOLBAR_REINIT', true);
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

    /**
     * Returns an array of fields the table can be sorted by
     *
     * @return  array  Array containing the field name to sort by as the key and display text as value
     *
     * @since   3.0
     */
    protected function getSortFields()
    {
        return array(
            'a.nom'     => JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_NOM'),
        );
    }
}