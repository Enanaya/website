<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Assigned Tasks</h3>
          <div class="box-tools">

          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th scope="col"><?= __('Task Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"> <?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
              </tr>

              <?php foreach ($query as $tasksUsers): ?>
                <?php if ($currentUser == $tasksUsers->user_id): ?>
                  <tr>
                    <td><?= h($tasksUsers->task->name) ?></td>
                    <td><?= h($tasksUsers->task->Description) ?></td>
                    <?php if($tasksUsers->task->Status == 'New'): ?>
                      <td><span class="badge bg-red"><?= h($tasksUsers->task->Status)?></span></td>
                    <?php elseif ($tasksUsers->task->Status == 'Ongoing'): ?>
                      <td><span class="badge bg-green"><?= h($tasksUsers->task->Status)?></span></td>
                    <?php elseif ($tasksUsers->task->Status == 'Complete' || 'complete'): ?>
                      <td><span class="badge bg-blue"><?= h($tasksUsers->task->Status)?><br></span></td>
                    <?php endif;?>

                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'tasks', 'action' => 'view', $tasksUsers->task->id]) ?>
                  <?= $this->Html->link(__('Edit'), ['controller' => 'tasks', 'action' => 'edit', $tasksUsers->task->id]) ?>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>

            </table>

          </div>
        </div>
      </div>
    </div>
  </section>
