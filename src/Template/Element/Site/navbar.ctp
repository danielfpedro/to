
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?= $this->Html->image('navbar_logo.jpg', ['url' => ['controller' => 'Site', 'action' => 'home']]) ?>
			</div>
			<div class="col-md-2 text-right">
				<?= $this->Form->create(null, ['type' => 'get', 'url' => ['controller' => 'Site', 'action' => 'busca']]) ?>
					<?= $this->Form->input('q', ['label' => false]) ?>
				<?= $this->Form->end() ?>
			</div>
			<div class="col-md-4 text-right">
				<?= $this->Html->link('Criar campanha', [
						'controller' => 'Campanhas',
						'action' => 'add'
					], [
						'class' => 'btn btn-primary btn-sm'
					]
				) ?>
			</div>
			<div class="col-md-2 text-right">
				<?php if ($authUser): ?>
					<div class="dropdown">
						<button
							class="btn btn-default dropdown-toggle"
							type="button"
							id="dropdownMenu1"
							data-toggle="dropdown">
							<?= $this->Html->image('https://graph.facebook.com/v2.5/'.$authUser['facebook_id'].'/picture', [
									'class' => 'img-circle',
									'width' => '22'
								]
							) ?>
							<?= $authUser['name'] ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
							<li>
								<?= $this->Html->link('Minhas Campanhas', [
									'controller' => 'Users',
									'action' => 'campanhas'
								]) ?>
							</li>
							<li class="divider"></li>
							<li>
								<?= $this->Html->link('Sair', ['controller' => 'Users', 'action' => 'logout']) ?>
							</li>
						</ul>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>