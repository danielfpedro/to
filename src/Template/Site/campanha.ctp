<?php
	$ribbonImage = $this->request->webroot . 'files/campanhas/ribbon/' . $campanha->ribbon_dir . '/' . $campanha->ribbon_image_name;
	$ribbonWidth = ($campanha->ribbon_width / 3) . 'px';
	$ribbonHeight = ($campanha->ribbon_height / 3) . 'px';

	$avatarImage = $this->request->webroot . '/img/avatar.png';
?>
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
						<div class="col-md-4">
							<div class="img-container" style="background-image: url(<?= $avatarImage ?>); width: 132px; height: 132px;">
								<div
									class="img-inside"
									style="background-image: url(<?= $ribbonImage ?>); width: <?= $ribbonWidth ?>; height: <?= $ribbonHeight ?>; left: <?= $campanha->ribbon_left / 3 ?>px; top: <?= $campanha->ribbon_top / 3 ?>px">
								</div>
							</div>
						</div>
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