<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_csmbcomponent&layout=edit&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>
        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_CSMBCOMPONENT_MANAGER_ADHERENT_GENERAL_TAB', true)); ?>
        <div class="row-fluid form-horizontal-desktop">
            <div class="span6">
                <?php foreach ($this->form->getFieldset('general') as $field): ?>
                    <div class="control-group">
                        <div class="control-label"><?php echo $field->label; ?></div>
                        <div class="controls"><?php echo $field->input; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'admin', JText::_('COM_CSMBCOMPONENT_MANAGER_ADHERENT_ADMIN_TAB', true)); ?>
        <div class="row-fluid form-horizontal-desktop">
            <div class="span6">
                <?php foreach ($this->form->getFieldset('administratif') as $field): ?>
                <div class="control-group">
                    <div class="control-label"><?php echo $field->label; ?></div>
                    <div class="controls"><?php echo $field->input; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
    </div>
        <!--<fieldset class="adminform">
            <legend><?php /*echo JText::_('COM_CSMBCOMPONENT_CSMBCOMPONENT_DETAILS'); */?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php /*foreach ($this->form->getFieldset() as $field): */?>
                        <div class="control-group">
                            <div class="control-label"><?php /*echo $field->label; */?></div>
                            <div class="controls"><?php /*echo $field->input; */?></div>
                        </div>
                    <?php /*endforeach; */?>
                    <div>
                        <div>
        </fieldset>-->
        <div>
            <input type="hidden" name="task" value="csmbcomponent.edit" />
            <?php echo JHtml::_('form.token'); ?>
</form>