<div class="container">
	<div class="row">
		<!-- MAIN -->
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-4">
					<h2>
						<?= $campanha->title ?>
					</h2>
					<small>Por: <?= $campanha->user->name ?></small>
					<p>
						<?= $campanha->texto ?>
					</p>
					<h4>6540 Pessoas apoiam esta campanham</h4>
					<h5>Compartilhar Campanha</h5>
					<?= $this->Html->link($this->Html->faIcon('facebook') . ' Facebook', [], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
					<?= $this->Html->link($this->Html->faIcon('twitter') . ' Twitter', [], ['class' => 'btn btn-info btn-xs', 'escape' => false]) ?>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4">O</div>
						<div class="col-md-4">+</div>
						<div class="col-md-4">O</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<?= $this->Html->link('Usar o Facebook', [], ['class' => 'btn btn-primary']) ?>
								<?= $this->Html->link('Trocar para Twitter', [], ['class' => 'btn btn-info btn-xs']) ?>
							</div>
						</div>
					</div>
				</div>
			</div>

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