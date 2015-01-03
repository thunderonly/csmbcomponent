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
        $section = $app->getUserStateFromRequest($this->context . 'filter.section', 'filter_section', '', 'string');
        $this->setState('filter.section', $section);

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

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
            ->select('a.id, a.nom, a.prenom, a.age, a.adresse, a.codepostal, a.ville, a.telephonefixe, a.telephoneportable, a.sectionid')
            ->from('#__csmbadherents AS a');

        $query->select('s.libelle AS libelle_section')
            ->join('INNER', '#__csmbsections AS s on a.sectionid = s.id');

        // Filter by country
        $section = $this->getState('filter.section');
        $search = $this->getState('filter.search');

        if (!empty($section))
        {
            $query->where('a.sectionid = "' .  $section . '"');
        }

        if (!empty($search))
        {
            $query->where('a.nom LIKE "' .  $search . '" OR a.prenom LIKE "' . $search . '"');
        }

        return $query;
    }
}