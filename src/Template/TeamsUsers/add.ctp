<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeamsUser $teamsUser
 */
?>

<div class="teamsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($teamsUser) ?>
    <fieldset>
        <legend><?= __('Add Teams User') ?></legend>
        <?php
        echo $this->Form->control('team_id', ['options' => $teams]);
        echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('Role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
