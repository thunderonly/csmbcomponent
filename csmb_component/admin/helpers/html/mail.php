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
abstract class JHtmlMail
{
	/**
	 * Display a batch widget for the access level selector.
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   1.7
	 */
	public static function sujet()
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		// Create the batch selector to change an access level on a selection list.
		return
			'<div class="control-label">'
			.'<label id="batch-sujet-lbl" for="batch-sujet" class="modalTooltip" '
			. 'title="' . JHtml::tooltipText('COM_CSMBCOMPONENT_MAIL_SUJET_LABEL', 'COM_CSMBCOMPONENT_MAIL_SUJET_DESC') . '">'
			. JText::_('COM_CSMBCOMPONENT_MAIL_SUJET_LABEL'). '</label></div>'
			. '<div class="controls"><input type="text" name="mail[sujet]" class="required"/></div>';
	}

	/**
	 * Displays a batch widget for moving or copying items.
	 *
	 * @param   string  $extension  The extension that owns the category.
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   1.7
	 */
	public static function message()
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		// Create the batch selector to change an access level on a selection list.
		return
			'<div class="control-label"><label id="batch-message-lbl" for="batch-message" class="modalTooltip" '
			. 'title="' . JHtml::tooltipText('COM_CSMBCOMPONENT_MAIL_MESSAGE_LABEL', 'COM_CSMBCOMPONENT_MAIL_MESSAGE_DESC') . '">'
			. JText::_('COM_CSMBCOMPONENT_MAIL_MESSAGE_LABEL')
			. '</label></div>'
			. '<div class="controls"><textarea name="mail[message]" class="mce_editable" style="width: 90%; height: 400px;"></textarea></div>';
	}

	/**
	 * Display a batch widget for the language selector.
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   2.5
	 */
	public static function language()
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		// Create the batch selector to change the language on a selection list.
		return
			'<label id="batch-language-lbl" for="batch-language-id" class="modalTooltip"'
			. ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_LANGUAGE_LABEL', 'JLIB_HTML_BATCH_LANGUAGE_LABEL_DESC') . '">'
			. JText::_('JLIB_HTML_BATCH_LANGUAGE_LABEL')
			. '</label>'
			. '<select name="batch[language_id]" class="inputbox" id="batch-language-id">'
			. '<option value="">' . JText::_('JLIB_HTML_BATCH_LANGUAGE_NOCHANGE') . '</option>'
			. JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text')
			. '</select>';
	}

	/**
	 * Display a batch widget for the user selector.
	 *
	 * @param   boolean  $noUser  Choose to display a "no user" option
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   2.5
	 */
	public static function user($noUser = true)
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		$optionNo = '';

		if ($noUser)
		{
			$optionNo = '<option value="0">' . JText::_('JLIB_HTML_BATCH_USER_NOUSER') . '</option>';
		}

		// Create the batch selector to select a user on a selection list.
		return
			'<label id="batch-user-lbl" for="batch-user" class="modalTooltip"'
			. ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_USER_LABEL', 'JLIB_HTML_BATCH_USER_LABEL_DESC') . '">'
			. JText::_('JLIB_HTML_BATCH_USER_LABEL')
			. '</label>'
			. '<select name="batch[user_id]" class="inputbox" id="batch-user-id">'
			. '<option value="">' . JText::_('JLIB_HTML_BATCH_USER_NOCHANGE') . '</option>'
			. $optionNo
			. JHtml::_('select.options', JHtml::_('user.userlist'), 'value', 'text')
			. '</select>';
	}

	/**
	 * Display a batch widget for the tag selector.
	 *
	 * @return  string  The necessary HTML for the widget.
	 *
	 * @since   3.1
	 */
	public static function tag()
	{
		JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

		// Create the batch selector to tag items on a selection list.
		return
			'<label id="batch-tag-lbl" for="batch-tag-id" class="modalTooltip"'
			. ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_TAG_LABEL', 'JLIB_HTML_BATCH_TAG_LABEL_DESC') . '">'
			. JText::_('JLIB_HTML_BATCH_TAG_LABEL')
			. '</label>'
			. '<select name="batch[tag]" class="inputbox" id="batch-tag-id">'
			. '<option value="">' . JText::_('JLIB_HTML_BATCH_TAG_NOCHANGE') . '</option>'
			. JHtml::_('select.options', JHtml::_('tag.tags', array('filter.published' => array(1))), 'value', 'text')
			. '</select>';
	}
}
