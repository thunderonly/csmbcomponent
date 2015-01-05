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
            0	=> array('featured',	'adherents.test',	'COM_CONTENT_FEATURED',		'COM_CONTENT_TOGGLE_TO_UNFEATURE'),
            1	=> array('featured',	'adherents.test',	'COM_CONTENT_FEATURED',		'COM_CONTENT_TOGGLE_TO_UNFEATURE'),
        );
        $state	= JArrayHelper::getValue($states, (int) $value, $states[1]);
        $icon	= $state[0];

        $html	= '<a href="#" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[3]) . '"><i class="icon-'
            . $icon . '"></i></a>';
        return $html;
    }
}