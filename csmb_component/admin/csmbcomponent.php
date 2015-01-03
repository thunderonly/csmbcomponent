<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

JLoader::register('ContentHelper', __DIR__ . '/helpers/content.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('CsmbComponent');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();