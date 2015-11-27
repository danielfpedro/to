<!-- Topo -->
<?= $this->element('Site/topo') ?>

<!-- Chamada -->
<!-- <div class="home-chamada-container">
	<div class="container">
		<div class="home-chamada-interno">
			<div class="row text-center">
				<div class="col-md-12">
					<p>Aqui você cria a sua campanha</p>
					<?= $this->Html->link('Criar Campanha', []) ?>
				</div>
			</div>
		</div>
	</div>
</div> -->

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