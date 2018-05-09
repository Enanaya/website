<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TasksUser[]|\Cake\Collection\CollectionInterface $tasksUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tasks User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasksUsers index large-9 medium-8 columns content">
    <h3><?= __('Tasks Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('task_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasksUsers as $tasksUser): ?>
            <tr>
                <td><?= $this->Number->format($tasksUser->id) ?></td>
                <td><?= $tasksUser->has('task') ? $this->Html->link($tasksUser->task->id, ['controller' => 'Tasks', 'action' => 'view', $tasksUser->task->id]) : '' ?></td>
                <td><?= $tasksUser->has('user') ? $this->Html->link($tasksUser->user->id, ['controller' => 'Users', 'action' => 'view', $tasksUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tasksUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tasksUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tasksUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasksUser->id)]) ?>
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
