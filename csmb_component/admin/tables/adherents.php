<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/01/15
 * Time: 19:43
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Hello Table class
 */
class CsmbComponentTableAdherents extends JTable
{
    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function __construct(&$db)
    {
        parent::__construct('#__csmbadherents', 'id', $db);
    }
}
