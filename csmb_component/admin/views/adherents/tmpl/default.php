<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/01/15
 * Time: 19:13
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>

<form action="<?php echo JRoute::_('index.php?option=com_csmbcomponent&view=adherents'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="j-sidebar-container" class="span2">
        <?php echo JHtmlSidebar::render(); ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php
        // Search tools bar
        echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
        ?>
            <table class="table table-striped" id="articleList">
                <thead><?php echo $this->loadTemplate('head');?></thead>
                <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
                <tbody><?php echo $this->loadTemplate('body');?></tbody>

            </table>
        </div>
        <div>
            <input type="hidden" name="task" value="" />
            <input type="hidden" name="boxchecked" value="0" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
</form>