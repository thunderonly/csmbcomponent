<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * HelloWorld Controller
 */
class CsmbComponentControllerMail extends JControllerForm
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
        $this->text_prefix .= "_MAIL";
    }

    public function sendMail() {

    }
}