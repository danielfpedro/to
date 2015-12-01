<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?= $this->element('Site/campanha_default', ['campanhas' => $campanhas]) ?>
		</div>
		<div class="col-md-4">
			<?= $this->cell('sidemenu') ?>
		</div>
	</div>

	<?= $this->Paginator->prev() ?>
	<?= $this->Paginator->next() ?>

</div>