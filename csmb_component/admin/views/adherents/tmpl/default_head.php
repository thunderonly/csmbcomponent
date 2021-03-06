<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/01/15
 * Time: 19:18
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

$app		= JFactory::getApplication();
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
$saveOrder	= $listOrder == 'a.ordering';


$sortFields = $this->getSortFields();
$assoc		= JLanguageAssociations::isEnabled();
?>
<script type="text/javascript">
    Joomla.orderTable = function()
    {
        table = document.getElementById("sortTable");
        direction = document.getElementById("directionTable");
        order = table.options[table.selectedIndex].value;
        if (order != '<?php echo $listOrder; ?>')
        {
            dirn = 'asc';
        }
        else
        {
            dirn = direction.options[direction.selectedIndex].value;
        }
        Joomla.tableOrdering(order, dirn, '');
    }
</script>
<tr>
    <th width="5" class="nowrap">
        <?php echo JHtml::_('grid.checkall'); ?>
    </th>
    <th width="5" class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_ID'); ?>
    </th>
    <th width="5" class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_ETAT'); ?>
    </th>
    <th class="nowrap">
        <?php echo JHtml::_('searchtools.sort', 'COM_CSMBCOMPONENT_ADHERENT_HEADING_NOM', 'a.nom', $listDirn, $listOrder); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_PRENOM'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_SEXE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_DATE_NAISSANCE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_ADRESSE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_CODEPOSTAL'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_VILLE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_TELEPHONEFIXE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_TELEPHONEPORTABLE'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_EMAIL'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_SECTION'); ?>
    </th>
    <th class="nowrap">
        <?php echo JText::_('COM_CSMBCOMPONENT_ADHERENT_HEADING_SAISON'); ?>
    </th>
</tr>