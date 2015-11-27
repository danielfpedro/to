<ul class="nav nav-pills nav-stacked">
	<?php foreach ($items as $item): ?>
		<li>
			<?= $this->Html->link($item['name'], $item['url']) ?>
		</li>
	<?php endforeach ?>
</ul>