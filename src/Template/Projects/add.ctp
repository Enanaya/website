<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Project $project
*/
?>

<div class="projects form large-9 medium-8 columns content">
  <?= $this->Form->create($project) ?>
  <fieldset>
    <legend><?= __('Add Project') ?></legend>
    <?php
    echo $this->Form->control('Name');
    echo $this->Form->select('Status', ['New' => 'New', 'Ongoing' => 'Ongoing', 'Complete' => 'Complete']);
    echo $this->Form->control('Deadline');
    ?>
  </fieldset>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>
</div>
