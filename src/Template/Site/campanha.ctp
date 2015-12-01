<script>
	$(function(){
		$('.img-inside').draggable({
			containment: "parent"
		});
		$('.img-inside').resizable({
			containment: "parent",
			aspectRatio: true,
			handles: {
				'sw': '#swgrip',
				'se': '#segrip',
				'nw': '#nwgrip',
				'ne': '#negrip',
				// 's': '#sgrip',
			}
		});

		$('#btn-show-info').click(function(){
			var w = $('.img-inside').width();
			var h = $('.img-inside').height();

			var offset = $('.img-inside').offset();

			$('#img-size').val(w + ' X ' + h);

			$('#img-top').val(offset.top - 8);
			$('#img-left').val(offset.left - 8);
		});
		$('.ui-resizable-handle').hide();

		var insideImgOffset = {
			top: $('#offset-top').val() + 'px',
			left: $('#offset-left').val() + 'px',
		};
		
		$('.img-inside').css(insideImgOffset);

		$('.img-container').hover(function(){
			$('.ui-resizable-handle').fadeToggle();
		}, function(){
			$('.ui-resizable-handle').fadeToggle();
		});
	});
</script>

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
							<div class="img-container" style="background-image: url(http://graph.facebook.com/<?= $authUser['facebook_id'] ?>/picture?type=square&width=140&height=140)">

								<?php $imgInside = $this->request->webroot . 'img/ribbon_test.png' ?>
								<div class="img-inside" style="background-image: url(<?= $imgInside ?>)">
					                <div id="swgrip" class="ui-resizable-handle ui-resizable-sw"></div>
					                <div id="segrip" class="ui-resizable-handle ui-resizable-se"></div>
					                <div id="nwgrip" class="ui-resizable-handle ui-resizable-nw"></div>
					                <div id="negrip" class="ui-resizable-handle ui-resizable-ne"></div>
								</div>
							</div>
							<input type="text" id="offset-top" value="<?= h($campanha->ribbon_top) ?>">
							<input type="text" id="offset-left" value="<?= h($campanha->ribbon_left) ?>">
						</div>
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