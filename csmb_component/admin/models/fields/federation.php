<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldFederation extends JFormField
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'federation';

    /**
     * Method to get a list of options for a list input.
     *
     * @return      array           An array of JHtml options.
     */
    protected function getInput()
    {
        return '<input type="text" name="filter[federation]" id="filter_federation" value="" placeholder="'.JText::_('COM_CSMBCOMPONENT_ADHERENT_SELECT_FEDERATION').'" />';
    }
}