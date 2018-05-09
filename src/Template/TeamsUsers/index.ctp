<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeamsUser[]|\Cake\Collection\CollectionInterface $teamsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Teams User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamsUsers index large-9 medium-8 columns content">
    <h3><?= __('Teams Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamsUsers as $teamsUser): ?>
            <tr>
                <td><?= $this->Number->format($teamsUser->id) ?></td>
                <td><?= $teamsUser->has('team') ? $this->Html->link($teamsUser->team->id, ['controller' => 'Teams', 'action' => 'view', $teamsUser->team->id]) : '' ?></td>
                <td><?= $teamsUser->has('user') ? $this->Html->link($teamsUser->user->id, ['controller' => 'Users', 'action' => 'view', $teamsUser->user->id]) : '' ?></td>
                <td><?= h($teamsUser->Role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teamsUser->team_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teamsUser->team_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teamsUser->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsUser->team_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
