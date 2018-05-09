<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks Users'), ['controller' => 'TasksUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tasks User'), ['controller' => 'TasksUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams Users'), ['controller' => 'TeamsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teams User'), ['controller' => 'TeamsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('First_Name');
            echo $this->Form->control('Surname');
            echo $this->Form->control('Department');
            echo $this->Form->control('Job_Title');
            echo $this->Form->control('Level');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
