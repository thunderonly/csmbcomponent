<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_config
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$this->name = JText::_('COM_CSMBCOMPONENT_ADHERENT_RESPONSABLE2');
$this->fieldsname = 'responsable2';
echo JLayoutHelper::render('joomla.content.options_default', $this);