<div class="container">
	<div class="row">
		<div class="col-md-8">
			
			<div class="row">
				<div class="col-md-4">
					<?php
						echo $this->Form->create(null, ['type' => 'GET']);
							echo $this->Form->input('q', ['label' => false, 'autocomplete' => 'off', 'value' => $this->request->query('q')]);
							echo $this->Form->submit('Buscar');
						echo $this->Form->end();
					?>
				</div>
			</div>

			<?= $this->element('Site/campanha_default', ['campanhas' => $campanhas, 'showEditButton' => true]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->cell('sidemenu') ?>
		</div>
	</div>
	<?= $this->Paginator->prev() ?>
	<?= $this->Paginator->next() ?>
</div>