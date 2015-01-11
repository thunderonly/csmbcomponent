<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('ContentHelper', JPATH_ADMINISTRATOR . '/components/com_content/helpers/content.php');

abstract class JHtmlContentAdministrator {

    public static function state($value = "En cours", $i, $canChange = true) {

        JHtml::_('bootstrap.tooltip');
        // Array of image, task, title, action
        $states	= array(
            "Renouveler"	=> array('unpublish',	'adherents.test',	'COM_CONTENT_FEATURED',		'COM_CSMBCOMPONENT_TITLE_STATUS_RENOUVELLER'),
            "En cours"	=> array('edit',	'adherents.test',	'COM_CONTENT_FEATURED',		'COM_CSMBCOMPONENT_TITLE_STATUS_ENCOURS'),
            "Valider"	=> array('publish',	'adherents.test',	'COM_CONTENT_FEATURED',		'COM_CSMBCOMPONENT_TITLE_STATUS_VALIDER'),
        );
        $state	= JArrayHelper::getValue($states, $value, $states["Renouveler"]);
        $icon	= $state[0];

//        $html	= '<a href="#" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[3]) . '"><i class="icon-'
//            . $icon . '"></i></a>';
        $html	= '<p class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '"  title="' . JHtml::tooltipText($state[3]) . '"><i class="icon-' . $icon . '"></i></p>';
        return $html;
    }

    public static function link_download() {

        JHtml::_('bootstrap.tooltip');

        $html	= '<a href="components/com_csmbcomponent/fiche_renouvellement.xml" download="fiche_renouvellement.xml">Télécharger le document</a>';
        return $html;
    }
}