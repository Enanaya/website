<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->control('First_Name');
        echo $this->Form->control('Surname');
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        echo $this->Form->label('Users.Level', 'Permission Set');
        echo $this->Form->select('Level', ['Admin', 'User']);
        echo $this->Form->control('Department');
        echo $this->Form->control('Job_Title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
