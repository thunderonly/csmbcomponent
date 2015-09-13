<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$published = $this->state->get('filter.published');
?>
<div class="modal hide fade" id="collapseModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&#215;</button>
		<h3><?php echo JText::_('COM_CSMBCOMPONENT_MAIL_TITRE'); ?></h3>
	</div>
	<div class="form-horizontal">
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<div class="control-group" style="margin-left: 10px; margin-top: 10px">
					<?php echo JHtml::_('mail.sujet'); ?>
				</div>
				<div class="control-group" style="margin-left: 10px; margin-top: 10px">
					<?php echo JHtml::_('mail.message'); ?>
				</div>
			</div>
		</div>

	</div>
	<div class="modal-footer">
		<button class="btn" type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value='';document.id('batch-tag-id)').value=''" data-dismiss="modal">
			<?php echo JText::_('JCANCEL'); ?>
		</button>
		<button class="btn btn-primary" type="submit" onclick="Joomla.submitbutton('adherents.sendEmail');">
			<?php echo JText::_('COM_CSMBCOMPONENT_MAIL_ENVOYER'); ?>
		</button>
	</div>
</div>

<div class="modal hide fade" id="collapseModal-Saison">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&#215;</button>
		<h3><?php echo JText::_('COM_CSMBCOMPONENT_CHANGE_SAISON_TITRE'); ?></h3>
	</div>
	<div class="form-horizontal">
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<div class="control-group" style="margin-left: 10px; margin-top: 10px">
					<?php echo JHtml::_('saison.saison'); ?>
				</div>
			</div>
		</div>

	</div>
	<div class="modal-footer">
		<button class="btn" type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value='';document.id('batch-tag-id)').value=''" data-dismiss="modal">
			<?php echo JText::_('JCANCEL'); ?>
		</button>
		<button class="btn btn-primary" type="submit" onclick="Joomla.submitbutton('adherents.saison');">
			<?php echo JText::_('COM_CSMBCOMPONENT_MAIL_ENVOYER'); ?>
		</button>
	</div>
</div>

<div class="modal hide fade" id="collapseModal-Attestation">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&#215;</button>
		<h3><?php echo JText::_('COM_CSMBCOMPONENT_ATTESTATION_TITRE'); ?></h3>
	</div>
	<div class="form-horizontal">
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<div class="control-group" style="margin-left: 10px; margin-top: 10px">
					<?php echo JHtml::_('attestation.montantChiffre'); ?>
				</div>
				<div class="control-group" style="margin-left: 10px; margin-top: 10px">
					<?php echo JHtml::_('attestation.payeur'); ?>
				</div>
			</div>
		</div>

	</div>
	<div class="modal-footer">
		<button class="btn" type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value='';document.id('batch-tag-id)').value=''" data-dismiss="modal">
			<?php echo JText::_('JCANCEL'); ?>
		</button>
		<button class="btn btn-primary" type="submit" onclick="Joomla.submitbutton('adherents.attestation');">
			<?php echo JText::_('COM_CSMBCOMPONENT_ATTESTATION_ENVOYER'); ?>
		</button>
	</div>
</div>
