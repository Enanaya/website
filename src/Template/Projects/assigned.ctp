<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
*/

?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Projects with Assigned Tasks</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tobdy>
              <tr>
                <th> <?= $this->Paginator->sort('Project') ?> </th>
                <th> <?= $this->Paginator->sort('Tasks') ?> </th>
                <th><?= $this->Paginator->sort('Progress') ?> </th>
              </tr>
              <!-- Iterates the Projects Array and Renders Associated Tasks -->

              <?php foreach ($query as $Projects): ?>
                <?php if ($Projects->tasks): ?>
                  <td><?= h($Projects->Name)?></td>
                  <td><?php foreach ($Projects->tasks as $tasks): ?>
                    <?php if($tasks->Status == 'New'): ?>
                      <span class="badge bg-red"><?= $this->Html->link(__($tasks->name), ['controller' => 'tasks', 'action' => 'view', $tasks->id], ['style' => 'text-decoration: none']) ?><br></span>
                    <?php elseif ($tasks->Status == 'Ongoing'): ?>
                      <span class="badge bg-green"><?= $this->Html->link(__($tasks->name), ['controller' => 'tasks', 'action' => 'view', $tasks->id]) ?><br></span>
                    <?php elseif ($tasks->Status == 'Complete' || 'complete'): ?>
                      <span class="badge bg-blue"><?= $this->Html->link(__($tasks->name), ['controller' => 'tasks', 'action' => 'view', $tasks->id]) ?><br></span>
                    <?php endif;?>
                  <?php endforeach; ?>
                </td>
                <?php if($Projects->Status == 'New'):?>
                <td>
                  <div class="progress progress-md">
                    <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                  </div>
                </td>
              <?php elseif($Projects->Status == 'Ongoing'): ?>
                <td>
                  <div class="progress progress-md">
                    <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                  </div>
                </td>
              <?php elseif ($Projects->Status == 'Completed'): ?>
                <td>
                  <div class="progress progress-md">
                    <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                  </div>
                </td>

<?php endif;?>
              <?php endif;?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
