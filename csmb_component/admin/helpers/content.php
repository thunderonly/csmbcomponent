<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Content component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_content
 * @since       1.6
 */
class ContentHelper extends JHelperContent
{
	public static $extension = 'com_content';

	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_CSMBCOMPONENT_MANAGER_CSMBCOMPONENT_SECTION_TAB'),
			'index.php?option=com_csmbcomponent&view=sections',
			$vName == 'section'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_CSMBCOMPONENT_MANAGER_CSMBCOMPONENT_ADHERENT_TAB'),
			'index.php?option=com_csmbcomponent&view=adherents',
			$vName == 'adherent');
	}

	/**
	 * Applies the content tag filters to arbitrary text as per settings for current user group
	 *
	 * @param   text  $text  The string to filter
	 *
	 * @return  string  The filtered string
	 *
	 * @deprecated  4.0  Use JComponentHelper::filterText() instead.
	*/
	public static function filterText($text)
	{
		JLog::add('ContentHelper::filterText() is deprecated. Use JComponentHelper::filterText() instead.', JLog::WARNING, 'deprecated');

		return JComponentHelper::filterText($text);
	}
}
