<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TasksUser $tasksUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tasksUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tasksUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tasks Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasksUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($tasksUser) ?>
    <fieldset>
        <legend><?= __('Edit Tasks User') ?></legend>
        <?php
            echo $this->Form->control('task_id', ['options' => $tasks]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
