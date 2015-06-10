<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 13/05/15
 * Time: 22:48
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

// Load tooltip behavior
JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

$function = JFactory::getApplication()->input->getCmd('function', 'jSelectMail');
?>
    <div class="modal hide fade" id="collapseModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&#215;</button>
            <h3><?php echo JText::_('COM_CONTENT_BATCH_OPTIONS'); ?></h3>
        </div>
        <div class="modal-body modal-batch">
            <table class="adminlist">
                <thead>
                <tr>
                    <th width="5" class="nowrap">
                        <?php echo JHtml::_('grid.checkall'); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'COM_LIBRARY_BOOKS_HEADING_TITLE', 'nom', $listDirn, $listOrder); ?>
                    </th>
                    <th width="5">
                        <?php echo JHtml::_('grid.sort', 'COM_LIBRARY_BOOKS_HEADING_ID', 'id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="6"><?php echo $this->pagination->getListFooter(); ?></td>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($this->items as $i => $item) : ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td>
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td>
                            <a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->nom)); ?> ; <?php echo $this->escape(addslashes($item->nom)); ?>');"><?php echo $this->escape($item->nom); ?></a>
                        </td>
                        <td><?php echo $item->id; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn" type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value='';document.id('batch-tag-id)').value=''" data-dismiss="modal">
                <?php echo JText::_('JCANCEL'); ?>
            </button>
            <button class="btn btn-primary" type="submit" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->nom)); ?> ; <?php echo $this->escape(addslashes($item->nom)); ?>');">
                <?php echo JText::_('JGLOBAL_BATCH_PROCESS'); ?>
            </button>
        </div>
<!--        <div>-->
<!--            <input type="hidden" name="task" value="" />-->
<!--            <input type="hidden" name="boxchecked" value="0" />-->
<!--            <input type="hidden" name="filter_order" value="--><?php //echo $listOrder; ?><!--" />-->
<!--            <input type="hidden" name="filter_order_Dir" value="--><?php //echo $listDirn; ?><!--" />-->
<!--            --><?php //echo JHtml::_('form.token'); ?>
<!--        </div>-->
    </div>