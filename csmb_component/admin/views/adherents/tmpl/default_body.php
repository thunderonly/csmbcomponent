<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
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
            <?php echo $item->nom; ?>
        </td>
        <td>
            <?php echo $item->prenom; ?>
        </td>
        <td>
            <?php echo $item->age; ?>
        </td>
    </tr>
<?php endforeach; ?>