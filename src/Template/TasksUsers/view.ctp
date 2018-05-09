<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TasksUser $tasksUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tasks User'), ['action' => 'edit', $tasksUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tasks User'), ['action' => 'delete', $tasksUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasksUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tasks User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tasksUsers view large-9 medium-8 columns content">
    <h3><?= h($tasksUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= $tasksUser->has('task') ? $this->Html->link($tasksUser->task->id, ['controller' => 'Tasks', 'action' => 'view', $tasksUser->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tasksUser->has('user') ? $this->Html->link($tasksUser->user->id, ['controller' => 'Users', 'action' => 'view', $tasksUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tasksUser->id) ?></td>
        </tr>
    </table>
</div>
