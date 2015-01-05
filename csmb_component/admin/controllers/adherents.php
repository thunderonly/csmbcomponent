<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * HelloWorlds Controller
 */
class CsmbComponentControllerAdherents extends JControllerAdmin
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
        $this->text_prefix .= "_ADHERENT";
        $this->registerTask('test',	'test');
    }

    /**
     * Proxy for getModel.
     *
     * @since       2.5
     */
    public function getModel($name = 'Adherent', $prefix = 'CsmbComponentModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));

        return $model;
    }

    public function test() {
        // Check for request forgeries
        JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

        // Get items to remove from the request.
        $cid = JFactory::getApplication()->input->get('cid', array(), 'array');

        if (!is_array($cid) || count($cid) < 1)
        {
            JLog::add(JText::_($this->text_prefix . '_NO_ITEM_SELECTED'), JLog::WARNING, 'jerror');
        }
        else
        {
            JArrayHelper::toInteger($cid);
            $model = $this->getModel();
            if ($model->reinit($cid)) {
                $this->setMessage(JText::plural($this->text_prefix . '_REINIT', count($cid)));
            } else {
                $this->setMessage($model->getError(), 'error');
            }
        }
        // Invoke the postDelete method to allow for the child class to access the model.
        $this->postDeleteHook($model, $cid);

        $this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false));
    }

    public function reinit2() {
        $ids    = JFactory::getApplication()->input->get('cid', array(), 'array');


        if (empty($ids))
        {
            JError::raiseWarning(500, JText::_('JERROR_NO_ITEMS_SELECTED'));
        }
        else
        {
            // Get the model.
            $model = $this->getModel();

            // Publish the items.
            if (!$model->reinit($ids))
            {
                JError::raiseWarning(500, $model->getError());
            }
        }
    }


}