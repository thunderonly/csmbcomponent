<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldDatedemandelicence extends JFormField
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'datedemandelicence';

    /**
     * Method to get a list of options for a list input.
     *
     * @return      array           An array of JHtml options.
     */
    protected function getInput()
    {
        return '<input type="text" name="filter[date_demande_licence]" id="filter_date_demande_licence" value="" placeholder="'.JText::_('COM_CSMBCOMPONENT_ADHERENT_SELECT_DATE_DEMANDE_LICENCE').'" />';
    }
}