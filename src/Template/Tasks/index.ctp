<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 *
 */
?>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">View Tasks</h3>
        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('id') ?></th>
  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Start_Time') ?></th>
              <th scope="col"><?= $this->Paginator->sort('End_Date') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Next_TaskID') ?></th>
              <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($tasks as $task): ?>
              <tr>
                <td><?= $this->Number->format($task->id) ?></td>
<td><?= h($task->name) ?></td>
                <td><?= h($task->Start_Time) ?></td>
                <td><?= h($task->End_Date) ?></td>
                <td><?= h($task->Status) ?></td>
                <td><?= h($task->Next_TaskID) ?></td>
                <td><?= $task->has('project') ? $this->Html->link($task->project->Name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
<td></td>
                <td class="actions">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

      <!-- /.box-body -->

    <!-- /.box -->
  </div>
</div>
<div class="paginator">
  <ul class="pagination">
    <?= $this->Paginator->first('<< ' . __('first')) ?>
    <?= $this->Paginator->prev('< ' . __('previous')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__('next') . ' >') ?>
    <?= $this->Paginator->last(__('last') . ' >>') ?>
  </ul>
  <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
</section>
