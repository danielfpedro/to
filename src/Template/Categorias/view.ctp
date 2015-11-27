<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campanhas'), ['controller' => 'Campanhas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campanha'), ['controller' => 'Campanhas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($categoria->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($categoria->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Campanhas') ?></h4>
        <?php if (!empty($categoria->campanhas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Text') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Photo Dir') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Categoria Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->campanhas as $campanhas): ?>
            <tr>
                <td><?= h($campanhas->id) ?></td>
                <td><?= h($campanhas->user_id) ?></td>
                <td><?= h($campanhas->title) ?></td>
                <td><?= h($campanhas->text) ?></td>
                <td><?= h($campanhas->photo) ?></td>
                <td><?= h($campanhas->photo_dir) ?></td>
                <td><?= h($campanhas->created) ?></td>
                <td><?= h($campanhas->modified) ?></td>
                <td><?= h($campanhas->slug) ?></td>
                <td><?= h($campanhas->categoria_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Campanhas', 'action' => 'view', $campanhas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Campanhas', 'action' => 'edit', $campanhas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campanhas', 'action' => 'delete', $campanhas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campanhas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
