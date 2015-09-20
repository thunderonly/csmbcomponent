<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldReglementcomplet extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'reglementcomplet';

    /**
     * Method to get a list of options for a list input.
     *
     * @return      array           An array of JHtml options.
     */
    protected function getOptions()
    {
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('DISTINCT reglement_complet');
        $query->from('#__csmbadherents');
        $db->setQuery((string) $query);
        $messages = $db->loadObjectList();
        $options  = array();
        if ($messages)
        {
            foreach ($messages as $message)
            {
                if ($message->reglement_complet == 1) {
                    $options[] = JHtml::_('select.option', $message->reglement_complet, "Oui");
                } else {
                    $options[] = JHtml::_('select.option', $message->reglement_complet, "Non");
                }

            }
        }
        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}