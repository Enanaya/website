<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Task $task
*/
?>
<div class="tasks form large-9 medium-8 columns content">
  <?= $this->Form->create($task) ?>
  <fieldset>
    <legend><?= __('Create Task') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('Description');
    echo $this->Form->select('Status', ['New' => 'New', 'Ongoing' => 'Ongoing', 'Complete' => 'Complete']);
    echo $this->Form->control('Start_Time');
    echo $this->Form->control('End_Date');
    echo $this->Form->control('Next_TaskID');
    echo $this->Form->control('project_id', ['options' => $projects]);

    ?>
  </fieldset>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>
</div>
