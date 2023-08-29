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
        parent::populateState('a.nom', 'asc');
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
            ->select('a.id, a.saison, a.nom, a.prenom, a.sexe, a.date_naissance, a.ville_naissance, a.adresse, a.codepostal, a.ville, a.telephonefixe, a.telephoneportable, a.email,'.
                'a.pere_nom, a.pere_prenom, a.pere_telephoneportable, a.mere_nom, a.mere_prenom, a.mere_telephoneportable,'.
                'a.responsable1_nom, a.responsable1_prenom, a.responsable1_telephone, a.responsable2_nom, a.responsable2_prenom, a.responsable2_telephone,'.
                'a.enveloppes, a.photos, a.identite, a.reglement, a.certificat, a.licence, a.datedemandelicence, a.datereceptionlicence,'.
                'a.etat, a.sectionid, a.saison, a.nb_cours, a.reglement_complet, a.federation, a.code_activite')
            ->from('#__csmbadherents AS a');

        $query->select('s.libelle AS libelle_section')
            ->join('INNER', '#__csmbsections AS s on a.sectionid = s.id');


        // Filter by country
        $section = $this->getState('filter.section');
        $etat = $this->getState('filter.etat');
        $saison = $this->getState('filter.saison');
        $nb_cours = $this->getState('filter.nb_cours');
        $reglement_complet = $this->getState('filter.reglement_complet');
        $federation = $this->getState('filter.federation');
        $date_demande_licence = $this->getState('filter.date_demande_licence');
        $search = $this->getState('filter.search');

        if (!empty($section))
        {
            $query->where('a.sectionid = "' .  $section . '"');
        }

        if (!empty($etat))
        {
            $query->where('a.etat = "' .  $etat . '"');
        }

        if (!empty($saison))
        {
            $query->where('a.saison = "' .  $saison . '"');
        }

        if (!empty($nb_cours))
        {
            $query->where('a.nb_cours = "' .  $nb_cours . '"');
        }

        if (is_numeric($reglement_complet))
        {
            $query->where('a.reglement_complet = ' . (int)$reglement_complet);
        }

        if (!empty($federation))
        {
            echo "federation " . $federation;
            $query->where('a.federation LIKE "' .  $federation . '"');
        }

        if (!empty($date_demande_licence))
        {
            $query->where('a.datedemandelicence LIKE "' .  $date_demande_licence . '"');
        }

        if (!empty($search))
        {
            $query->where('a.nom LIKE "' .  $search . '" OR a.prenom LIKE "' . $search . '"');
        }

        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering', 'a.nom');
        $orderDirn = $this->state->get('list.direction', 'asc');

        $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }
}