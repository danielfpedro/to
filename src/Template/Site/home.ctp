<!-- Topo -->
<?= $this->element('Site/topo') ?>

<div class="container">
	<div class="row">
		<!-- MAIN -->
		<div class="col-md-10">
			<h2>Escolhidos</h2>
			<?= $this->cell('CampanhasHome', ['escolhidos']) ?>

			<h2>Populares</h2>
			<?= $this->cell('CampanhasHome', ['populares']) ?>
		</div>
		<div class="col-md-2">
			<?= $this->cell('Sidemenu') ?>
		</div>
	</div>
</div>