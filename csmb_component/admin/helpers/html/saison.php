<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Extended Utility class for batch processing widgets.
 *
 * @package     Joomla.Libraries
 * @subpackage  HTML
 * @since       1.7
 */
abstract class JHtmlSaison
{
	/**
	 * Display a batch widget for the access level selector.
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   1.7
	 */
	public static function saison()
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		// Create the batch selector to change an access level on a selection list.
		return
			'<div class="control-label">'
			.'<label id="batch-saison-lbl" for="batch-saison" class="modalTooltip" '
			. 'title="' . JHtml::tooltipText('COM_CSMBCOMPONENT_CHANGE_SAISON_LABEL', 'COM_CSMBCOMPONENT_CHANGE_SAISON_DESC') . '">'
			. JText::_('COM_CSMBCOMPONENT_CHANGE_SAISON_LABEL'). '</label></div>'
			. '<div class="controls"><input type="text" name="saison[saison]" class="required"/></div>';
	}

}
