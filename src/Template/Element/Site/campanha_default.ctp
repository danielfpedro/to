<div class="row">
    <?php foreach ($campanhas as $campanha): ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <?= $this->Html->image($campanha->imgFullPath) ?>
                <div class="caption">
                    <h3><?= $this->Html->link($campanha->title, $campanha->url) ?></h3>
                    <span class="label label-primary"><?= $this->Html->link(h($campanha->categoria->name), ['controller' => 'Site', 'action' => 'categoria', h($campanha->categoria->slug)]) ?></span>
                    <p><?= $this->Html->link($campanha->text, $campanha->url) ?></p>
                    <?php if (isset($showEditButton) && $authUser['id'] == $campanha->user->id): ?>
                        <?= $this->Html->link('Editar', ['controller' => 'Campanhas', 'action' => 'edit', $campanha->id]) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>