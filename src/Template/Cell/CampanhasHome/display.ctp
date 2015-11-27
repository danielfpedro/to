<div class="row">
	<?php foreach ($campanhas as $campanha): ?>
		<div class="col-md-4">
			<h4>
				<?= $this->Html->link($campanha['title'], $campanha['url']) ?>	
			</h4>
		</div>
	<?php endforeach ?>
</div>