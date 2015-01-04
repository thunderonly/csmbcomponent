<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * HelloWorld Model
 */
class CsmbComponentModelAdherent extends JModelAdmin
{
    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param       type    The table type to instantiate
     * @param       string  A prefix for the table class name. Optional.
     * @param       array   Configuration array for model. Optional.
     *
     * @return      JTable  A database object
     * @since       2.5
     */
    public function getTable($type = 'Adherents', $prefix = 'CsmbComponentTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to get the record form.
     *
     * @param       array   $data     Data for the form.
     * @param       boolean $loadData True if the form is to load its own data (default case), false if not.
     *
     * @return      mixed   A JForm object on success, false on failure
     * @since       2.5
     */
    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_csmbcomponent.adherent', 'adherent',
            array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return      mixed   The data for the form.
     * @since       2.5
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_csmbcomponent.edit.adherent.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    public function reinit(&$pks) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.
        foreach ($pks as $i => $pk) {

            if ($table->load($pk)) {
                $table->enveloppes = 0;
                $table->photos = 0;
                $table->identite = 0;
                $table->reglement = '';
                $table->certificat = '';
                $table->datedemandelicence = '';
                $table->datereceptionlicence = '';
                if (!$table->store()) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }
        return true;
    }
}