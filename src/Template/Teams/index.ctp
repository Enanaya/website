<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team[]|\Cake\Collection\CollectionInterface $teams
 */
?>

<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Teams</h3>
        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody>
          <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
            <?php foreach ($teams as $team): ?>
            <tr>
                <td><?= $this->Number->format($team->id) ?></td>
                <td><?= h($team->Name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $team->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $team->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>
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
</div>
</section>
