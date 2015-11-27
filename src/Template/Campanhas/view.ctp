<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campanha'), ['action' => 'edit', $campanha->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campanha'), ['action' => 'delete', $campanha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campanha->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campanhas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campanha'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campanhas view large-9 medium-8 columns content">
    <h3><?= h($campanha->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $campanha->has('user') ? $this->Html->link($campanha->user->name, ['controller' => 'Users', 'action' => 'view', $campanha->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($campanha->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($campanha->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($campanha->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($campanha->photo_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($campanha->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($campanha->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($campanha->modified) ?></td>
        </tr>
    </table>
</div>
