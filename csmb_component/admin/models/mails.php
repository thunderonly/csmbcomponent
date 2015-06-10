<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class CsmbComponentModelMails extends JModelList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'sujet', 'a.sujet');
        }

        parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication();

        // Other code goes here
        $sujet = $app->getUserStateFromRequest($this->context . 'filter.sujet', 'filter_sujet', '', 'string');
        $this->setState('filter.sujet', $sujet);

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
            ->from('#__csmbmails AS a');

        // Filter by country
        $sujet = $this->getState('filter.sujet');

        if (!empty($sujet))
        {
            $query->where('a.sujet = "' .  $sujet . '"');
        }

        return $query;
    }
}