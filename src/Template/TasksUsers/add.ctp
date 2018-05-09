<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TasksUser $tasksUser
 */
?>

<div class="tasksUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($tasksUser) ?>
    <fieldset>
        <legend><?= __('Add Tasks User') ?></legend>
        <?php
            echo $this->Form->control('task_id', ['options' => $tasks]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
