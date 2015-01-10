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
                $table->etat = 'Renouveler';
                if (!$table->store()) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }
        return true;
    }

    public function toValidate(&$pks) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.
        foreach ($pks as $i => $pk) {

            if ($table->load($pk)) {
                $table->etat = 'En cours';
                if (!$table->store()) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }
        return true;
    }

    public function validate(&$pks) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.
        foreach ($pks as $i => $pk) {

            if ($table->load($pk)) {
                $table->etat = 'Valider';
                if (!$table->store()) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }
        return true;
    }

    public function word(&$pks) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.

        $file=file_get_contents('components/com_csmbcomponent/template.xml');
        $pos_begin_sect = strripos($file,"<wx:sect>");
        $pos_end_sect = strripos($file,"</wx:sect>")+10;

        $beginDocument = substr($file, 0, $pos_begin_sect);
        $endDocument = substr($file, (int)$pos_end_sect);
        $sectTemplate = substr($file, (int)$pos_begin_sect, ((int)$pos_end_sect - $pos_begin_sect));

        $document = $beginDocument;
        $index = 1;
        foreach ($pks as $i => $pk) {

            if ($table->load($pk)) {
                $sect = $sectTemplate;
                $sect = str_replace('${Value1}', $table->nom, $sect);
                $sect = str_replace('${Value2}', $table->prenom, $sect);
                $document .= $sect;
                if ($index < count($pks)) {
                    $document .= '<w:p wsp:rsidR="00475ACF" wsp:rsidRDefault="00475ACF" wsp:rsidP="00475ACF"><w:r><w:br w:type="page"/></w:r></w:p>';
                }
                $index = $index + 1;
                if (!$table->store()) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }
        $document .= $endDocument;
        $newFile = fopen('components/com_csmbcomponent/fiche_renouvellement.xml', 'w');
        fwrite($newFile, $document);
        fclose($newFile);
        return true;
    }
}