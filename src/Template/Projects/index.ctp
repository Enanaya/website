<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
*/

?>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">View Projects</h3>
        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th <?= $this->Paginator->sort('id') ?></th>
              <th <?= $this->Paginator->sort('Name') ?></th>
              <th <?= $this->Paginator->sort('Status') ?></th>
              <th <?= $this->Paginator->sort('created') ?></th>
              <th <?= $this->Paginator->sort('Deadline') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($projects as $project): ?>
              <tr>
                <td><?= $this->Number->format($project->id) ?></td>
                <td><?= h($project->Name) ?></td>
                <?php if ($project->Status == 'Ongoing'): ?>
                <td class="label-primary"><span><?= ($project->Status) ?></span></td>
              <?php else: ?>
              <td class="label-success"><span><?= ($project->Status) ?></span></td>
              <?php endif; ?>
                <td><?= h($project->created) ?></td>
                <td><?= h($project->Deadline) ?></td>
                <td class="actions">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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
