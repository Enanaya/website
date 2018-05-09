<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks Users'), ['controller' => 'TasksUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tasks User'), ['controller' => 'TasksUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams Users'), ['controller' => 'TeamsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teams User'), ['controller' => 'TeamsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->First_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($user->Surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= h($user->Department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Title') ?></th>
            <td><?= h($user->Job_Title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($user->Level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tasks Users') ?></h4>
        <?php if (!empty($user->tasks_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Task Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->tasks_users as $tasksUsers): ?>
            <tr>
                <td><?= h($tasksUsers->id) ?></td>
                <td><?= h($tasksUsers->task_id) ?></td>
                <td><?= h($tasksUsers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TasksUsers', 'action' => 'view', $tasksUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TasksUsers', 'action' => 'edit', $tasksUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TasksUsers', 'action' => 'delete', $tasksUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasksUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams Users') ?></h4>
        <?php if (!empty($user->teams_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Team Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->teams_users as $teamsUsers): ?>
            <tr>
                <td><?= h($teamsUsers->id) ?></td>
                <td><?= h($teamsUsers->team_id) ?></td>
                <td><?= h($teamsUsers->user_id) ?></td>
                <td><?= h($teamsUsers->Role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TeamsUsers', 'action' => 'view', $teamsUsers->team_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TeamsUsers', 'action' => 'edit', $teamsUsers->team_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamsUsers', 'action' => 'delete', $teamsUsers->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsUsers->team_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
