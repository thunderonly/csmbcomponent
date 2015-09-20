<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldNbcours extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'nbcours';

    /**
     * Method to get a list of options for a list input.
     *
     * @return      array           An array of JHtml options.
     */
    protected function getOptions()
    {
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('DISTINCT nb_cours');
        $query->from('#__csmbadherents');
        $db->setQuery((string) $query);
        $messages = $db->loadObjectList();
        $options  = array();
        if ($messages)
        {
            foreach ($messages as $message)
            {
                $options[] = JHtml::_('select.option', $message->nb_cours);
            }
        }
        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}