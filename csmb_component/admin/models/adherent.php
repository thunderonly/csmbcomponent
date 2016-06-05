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
            // item = adherent
            if ($table->load($pk)) {
                $table->enveloppes = 0;
                $table->photos = 0;
                $table->identite = 0;
                $table->reglement = '';
                $table->certificat = '';
                $table->datedemandelicence = '';
                $table->datereceptionlicence = '';
                $table->saison = $table->saison + 1;
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

    public function valider(&$pks) {

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

    public function word(&$pks, $saison) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.

        $file=file_get_contents('components/com_csmbcomponent/FicheRenouvellement2016.xml');
        $pos_begin_sect = strripos($file,"<wx:sect>");
        $pos_end_sect = strripos($file,"</wx:sect>")+10;

        $beginDocument = substr($file, 0, $pos_begin_sect);
        $endDocument = substr($file, (int)$pos_end_sect);
        $sectTemplate = substr($file, (int)$pos_begin_sect, ((int)$pos_end_sect - $pos_begin_sect));

        $document = $beginDocument;
        $index = 1;
        foreach ($pks as $i => $pk) {

            if ($table->load($pk) && ($table->etat != "Renouveler")) {
                $sect = $sectTemplate;
                $saison = $table->saison;
                $sect = str_replace('${Value100}', $saison, $sect);
                $sect = str_replace('${Value101}', $saison + 1, $sect);
                $sect = str_replace('${Value0}', $this->getSection($table->sectionid), $sect);
                $sect = str_replace('${Value1}', $this->formatData($table->nom, 50), $sect);
                $sect = str_replace('${Value2}', $this->formatData($table->prenom, 50), $sect);
                $sect = str_replace('${Value3}', $table->sexe, $sect);
                $sect = str_replace('${Value4}', $this->formatData($table->date_naissance, 50), $sect);
                $sect = str_replace('${Value5}', $this->formatData($table->ville_naissance, 50), $sect);
                $sect = str_replace('${Value6}', $this->formatData($table->adresse, 240), $sect);
                $sect = str_replace('${Value7}', $this->formatData($table->codepostal, 40), $sect);
                $sect = str_replace('${Value8}', $this->formatData($table->ville, 20), $sect);
                $sect = str_replace('${Value9}', $this->formatData($table->telephonefixe, 20), $sect);
                $sect = str_replace('${Value10}', $this->formatData($table->telephoneportable, 20), $sect);
                $sect = str_replace('${Value11}', $this->formatData($table->email, 40), $sect);

                $sect = str_replace('${Value12}', $this->formatData($table->pere_nom, 30), $sect);
                $sect = str_replace('${Value13}', $this->formatData($table->pere_prenom, 30), $sect);
                $sect = str_replace('${Value14}', $this->formatData($table->pere_telephoneportable, 30), $sect);

                $sect = str_replace('${Value15}', $this->formatData($table->mere_nom, 30), $sect);
                $sect = str_replace('${Value16}', $this->formatData($table->mere_prenom, 30), $sect);
                $sect = str_replace('${Value17}', $this->formatData($table->mere_telephoneportable, 30), $sect);

                $sect = str_replace('${Value18}', $this->formatData($table->responsable1_nom, 30), $sect);
                $sect = str_replace('${Value19}', $this->formatData($table->responsable1_prenom, 30), $sect);
                $sect = str_replace('${Value20}', $this->formatData($table->responsable1_telephone, 30), $sect);

                $sect = str_replace('${Value21}', $this->formatData($table->responsable2_nom, 30), $sect);
                $sect = str_replace('${Value22}', $this->formatData($table->responsable2_prenom, 30), $sect);
                $sect = str_replace('${Value23}', $this->formatData($table->responsable2_telephone, 30), $sect);
                $sect = str_replace('${Value24}', $this->formatData($table->licence, 30), $sect);
                $document .= $sect;
                if ($index < count($pks)) {
                    $document .= '<w:p wsp:rsidR="00475ACF" wsp:rsidRDefault="00475ACF" wsp:rsidP="00475ACF"><w:r><w:br w:type="page"/></w:r></w:p>';
                }
                $index = $index + 1;
//                $table->saison = $saison;
//                if (!$table->store()) {
//                    $this->setError($table->getError());
//                    return false;
//                }
            }
        }
        $document .= $endDocument;
        $newFile = fopen('components/com_csmbcomponent/fiche_renouvellement.doc', 'w');
        fwrite($newFile, $document);
        fclose($newFile);

        return true;
    }

    private function formatData(&$string, $lenght) {
        $result = $string;
        $lenghtString = strlen($string);
        if (strlen($string) < $lenght ) {
            for($indexString = $lenghtString; $indexString < $lenght; $indexString++ ) {
                $result .=" ";
            }
        }
        return $result;
    }

    private function getSection(&$idSection) {
        $table = JTable::getInstance("Sections", 'CsmbComponentTable', array());
        if ($table->load($idSection)) {
            return $table->libelle;
        }
        return "";
    }

    public function sendEmail(&$pks, $sujet, $message) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.
        foreach ($pks as $i => $pk) {
            // item = adherent
            if ($table->load($pk)) {
                $email = $table->email;
                $tableMail = JTable::getInstance("Mails", 'CsmbComponentTable', array());
                $tableMail->sujet=$sujet;
                $tableMail->message=$message;
                $tableMail->destinataire=$table->nom;
                $tableMail->store();

                $headers ='From: postmaster@csmb13.fr'."\n";
                $headers .='Reply-To: postmaster@csmb13.fr'."\n";
                $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
                $headers .='Content-Transfer-Encoding: 8bit';
                mail($email, $sujet,
                    $message, $headers);
            }
        }
        return true;
    }

    public function attestation(&$pks, $attestation) {

        $pks = (array) $pks;
        $table = $this->getTable();
        // Iterate the items to delete each one.

        $file=file_get_contents('components/com_csmbcomponent/Attestation.xml');
        $pos_begin_sect = strripos($file,"<w:body>");
        $pos_end_sect = strripos($file,"</w:body>")+9;

        $beginDocument = substr($file, 0, $pos_begin_sect);
        $endDocument = substr($file, (int)$pos_end_sect);
        $sectTemplate = substr($file, (int)$pos_begin_sect, ((int)$pos_end_sect - $pos_begin_sect));

        $document = $beginDocument;
        $index = 1;
        foreach ($pks as $i => $pk) {

            if ($table->load($pk)) {
                $sect = $sectTemplate;
                $saison = $table->saison;
                $newSaison =$saison."/";
                $newSaison .=$saison+1;
                $montantChiffre = $attestation[montantChiffre];
                $payeur = $attestation[payeur];
                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                $sect = str_replace('${Value0}', strftime('%d %B %Y', time()), $sect);
                $sect = str_replace('${Value1}', $table->nom, $sect);
                $sect = str_replace('${Value2}', $table->prenom, $sect);
                $sect = str_replace('${Value3}', $table->date_naissance, $sect);
                $sect = str_replace('${Value4}', $this->getSection($table->sectionid), $sect);
                $sect = str_replace('${Value5}', $newSaison, $sect);
                $sect = str_replace('${Value6}', $montantChiffre, $sect);
                $sect = str_replace('${Value7}', $this->int2alpha($montantChiffre,true), $sect);
                $date = date("d/m/Y", strtotime($table->reglement));
                if ($table->reglement == "" OR $table->reglement == 0) {
                    $date = "";
                }
                $sect = str_replace('${Value8}', $date, $sect);
                $sect = str_replace('${Value9}', $payeur, $sect);
                $document .= $sect;
                if ($index < count($pks)) {
                    $document .= '<w:p wsp:rsidR="00475ACF" wsp:rsidRDefault="00475ACF" wsp:rsidP="00475ACF"><w:r><w:br w:type="page"/></w:r></w:p>';
                }
                $index = $index + 1;
            }
        }
        $document .= $endDocument;
//        unlink('components/com_csmbcomponent/attestation_generee.doc');
        $newFile = fopen('components/com_csmbcomponent/attestation_generee.doc', 'w');
        fwrite($newFile, $document);
        fclose($newFile);

        return true;
    }

    // Fonction int2alpha pour gérer la partie entière
    // Fonction dec2alpha pour la partie décimal
    // Partie décimale : on se limite à 2 chiffres
    // Et c'est plutôt cool x_x
    // Fonction float2alpha : la fonction globale
    // C'est elle qui t'intéresse en fait.
    public function int2alpha($number, $root = true)
    {
        $number = (int)$number;
        if($number >= 1000)
        {
            $num_arr = array();
            for($i = strlen("$number"); $i > 0; $i -= 3);
            {
                $j = ($i > 3) ? $i - 3 : 0;
                array_unshift($num_arr, substr("$number", $j, 3));
            }
            $num_arr = array_map(create_function('$a', 'return int2alpha($a, false);'), $num_arr);
            $output = '';
            while(count($num_arr) > 0)
            {
                $output .= ' ' . array_shift($num_arr);
                if(count($num_arr) > 0)
                {
                    switch(count($num_arr) % 3)
                    {
                        case 1:
                            $output .= ' mille';
                            break;

                        case 2:
                            $output .= ' million';
                            break;

                        default:
                            $output .= ' milliard';
                    }
                }
            }
        }
        elseif($number >= 100)
        {
            $centaines = $this->int2alpha($number / 100);
            $reste = $this->int2alpha($number % 100);
            if ($reste == "zéro") {
                $output = implode('', array(($centaines == 'un') ? 'cent' : "$centaines cents", ""));
            } else {
                $output = implode(' ', array(($centaines == 'un') ? 'cent' : "$centaines cent", $reste));
            }

        }
        elseif($number > 80)
        {
            $number -= 80;
            $output = 'quatre-vingt-' . $this->int2alpha($number);
        }
        elseif($number == 80)
        {
            $output = 'quatre-vingt';
        }
        elseif($number > 61)
        {
            $number -= 60;
            $output = 'soixante-' . $this->int2alpha($number);
        }
        elseif($number >= 20)
        {
            $dixaine = $number / 10;
            $unite = $number % 10;
            switch($dixaine)
            {
                case 2:
                    $output = 'vingt';
                    break;

                case 3:
                    $output = 'trente';
                    break;

                case 4:
                    $output = 'quarante';
                    break;

                case 5:
                    $output = 'cinquante';
                    break;

                case 6:
                    $output = 'soixante';
                    break;
            }
            switch($unite)
            {
                case 0:
                    break;

                case 1:
                    $output .= ' et un';
                    break;

                default:
                    $output .= "-$unite";
            }
        }
        elseif($number > 16)
        {
            $output = 'dix-'.$this->int2alpha($number % 10);
        }
        else
        {
            switch($number)
            {
                case 0:
                    if($root)
                        $output = 'zéro';
                    else
                        $output = '';
                    break;

                case 1:
                    $output = 'un';
                    break;

                case 2:
                    $output = 'deux';
                    break;

                case 3:
                    $output = 'trois';
                    break;

                case 4:
                    $output = 'quatre';
                    break;

                case 5:
                    $output = 'cinq';
                    break;

                case 6:
                    $output = 'six';
                    break;

                case 7:
                    $output = 'sept';
                    break;

                case 8:
                    $output = 'huit';
                    break;

                case 9:
                    $output = 'neuf';
                    break;

                case 10:
                    $output = 'dix';
                    break;

                case 11:
                    $output = 'onze';
                    break;

                case 12:
                    $output = 'douze';
                    break;

                case 13:
                    $output = 'treize';
                    break;

                case 14:
                    $output = 'quatorze';
                    break;

                case 15:
                    $output = 'quinze';
                    break;

                case 16:
                    $output = 'seize';
                    break;
            }
        }
        return $output;
    }
}