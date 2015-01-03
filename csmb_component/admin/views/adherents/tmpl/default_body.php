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
            <?php echo $item->libelle_section; ?>
        </td>
    </tr>
<?php endforeach; ?>