<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
?>
<?php foreach ($this->items as $i => $item): ?>
    <tr class="row<?php echo $i % 2; ?>">
        <td>
            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
        </td>
        <td>
            <?php echo $item->id; ?>
        </td>
        <td>
            <div class="btn-group">
                <?php echo JHtml::_('contentadministrator.state', $item->etat, $i); ?>
            </div>
        </td>
        <td>
            <a href="<?php echo JRoute::_('index.php?option=com_csmbcomponent&view=adherent&layout=edit&id=' . $item->id); ?>" title="<?php echo JText::_('JACTION_EDIT'); ?>">
                <?php echo $this->escape($item->nom); ?></a>
        </td>
        <td>
            <?php echo $item->prenom; ?>
        </td>
        <td>
            <?php echo $item->sexe; ?>
        </td>
        <td>
            <?php echo $item->date_naissance; ?>
        </td>
        <td>
            <?php echo $item->adresse; ?>
        </td>
        <td>
            <?php echo $item->codepostal; ?>
        </td>
        <td>
            <?php echo $item->ville; ?>
        </td>
        <td>
            <?php echo $item->telephonefixe; ?>
        </td>
        <td>
            <?php echo $item->telephoneportable; ?>
        </td>
        <td>
            <?php echo $item->email; ?>
        </td>
        <td>
            <?php echo $item->libelle_section; ?>
        </td>
        <td>
            <?php echo $item->saison; ?>
        </td>
    </tr>
<?php endforeach; ?>