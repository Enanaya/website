<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>

                <th scope="col"><?= $this->Paginator->sort('First_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job_Title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Level') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $this->Number->format($user->id) ?></td>

                  <td><?= h($user->First_Name) ?></td>
                  <td><?= h($user->Surname) ?></td>
                  <td><?= h($user->email) ?></td>
                  <td><?= h($user->Department) ?></td>
                  <td><?= h($user->Job_Title) ?></td>
                  <td><?= h($user->Level) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
