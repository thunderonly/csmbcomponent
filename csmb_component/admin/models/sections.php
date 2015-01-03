<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class CsmbComponentModelSections extends JModelList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'libelle', 'a.libelle');
        }

        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication();

        // Other code goes here
        $libelle = $app->getUserStateFromRequest($this->context . 'filter.libelle', 'filter_libelle', '', 'string');
        $this->setState('filter.libelle', $libelle);

        // Other code goes here

        // List state information.
        parent::populateState('a.id', 'asc');
    }

    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        // Select some fields from the hello table
        $query
            ->select('*')
            ->from('#__csmbsections AS a');

        // Filter by country
        $libelle = $this->getState('filter.libelle');

        if (!empty($libelle))
        {
            $query->where('a.libelle = "' .  $libelle . '"');
        }

        return $query;
    }
}