<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Sections Controller
 */
class CsmbComponentControllerSections extends JControllerAdmin
{
    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     *
     * @see     JControllerLegacy
     * @since   12.2
     * @throws  Exception
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->text_prefix .= "_SECTION";
    }

    /**
     * Proxy for getModel.
     *
     * @since       2.5
     */
    public function getModel($name = 'Section', $prefix = 'CsmbComponentModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));

        return $model;
    }
}