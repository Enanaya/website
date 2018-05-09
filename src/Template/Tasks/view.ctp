<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($task->Status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $task->has('project') ? $this->Html->link($task->project->id, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Next TaskID') ?></th>
            <td><?= $this->Number->format($task->Next_TaskID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($task->Start_Time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($task->End_Date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($task->Description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks Users') ?></h4>
        <?php if (!empty($task->tasks_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Task Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->tasks_users as $tasksUsers): ?>
            <tr>
                <td><?= h($tasksUsers->id) ?></td>
                <td><?= h($tasksUsers->user_id) ?></td>
                <td><?= h($tasksUsers->task_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TasksUsers', 'action' => 'view', $tasksUsers->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TasksUsers', 'action' => 'edit', $tasksUsers->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TasksUsers', 'action' => 'delete', $tasksUsers->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasksUsers->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
