<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeamsUser $teamsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teams User'), ['action' => 'edit', $teamsUser->team_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teams User'), ['action' => 'delete', $teamsUser->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsUser->team_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teams User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamsUsers view large-9 medium-8 columns content">
    <h3><?= h($teamsUser->team_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= $teamsUser->has('team') ? $this->Html->link($teamsUser->team->id, ['controller' => 'Teams', 'action' => 'view', $teamsUser->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $teamsUser->has('user') ? $this->Html->link($teamsUser->user->id, ['controller' => 'Users', 'action' => 'view', $teamsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($teamsUser->Role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teamsUser->id) ?></td>
        </tr>
    </table>
</div>
