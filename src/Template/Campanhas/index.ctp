<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campanha'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campanhas index large-9 medium-8 columns content">
    <h3><?= __('Campanhas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('photo_dir') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campanhas as $campanha): ?>
            <tr>
                <td><?= $this->Number->format($campanha->id) ?></td>
                <td><?= $campanha->has('user') ? $this->Html->link($campanha->user->name, ['controller' => 'Users', 'action' => 'view', $campanha->user->id]) : '' ?></td>
                <td><?= h($campanha->title) ?></td>
                <td><?= h($campanha->text) ?></td>
                <td><?= h($campanha->photo) ?></td>
                <td><?= h($campanha->photo_dir) ?></td>
                <td><?= h($campanha->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campanha->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campanha->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campanha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campanha->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
