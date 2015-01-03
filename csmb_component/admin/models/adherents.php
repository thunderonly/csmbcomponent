<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class CsmbComponentModelAdherents extends JModelList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'nom', 'a.nom',
                'prenom', 'a.prenom');
        }

        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication();

        // Other code goes here
        $nom = $app->getUserStateFromRequest($this->context . 'filter.nom', 'filter_nom', '', 'string');
        $this->setState('filter.nom', $nom);

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
            ->from('#__csmbadherents AS a');

        // Filter by country
        $nom = $this->getState('filter.nom');

        if (!empty($nom))
        {
            $query->where('a.nom = "' .  $nom . '"');
        }

        return $query;
    }
}