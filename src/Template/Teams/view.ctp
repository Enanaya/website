<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Team $team
*/
?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">

          <h3 class="profile-username text-center"><?= h($team->Name) ?></h3>

          <p class="text-muted text-center"><?= h($team->id) ?></p>

          <ul class="list-group list-group-unbordered">

            <a class="pull-right"><?= $this->Text->autoParagraph(h($team->Description)); ?></a>
          </ul>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Team Members</h3>
          </div>
          <!-- /.box-header -->
          <?php if (!empty($team->teams_users)): ?>
            <div class="box-body">
              <?php foreach ($team->teams_users as $teamsUsers): ?>
                <strong><i class="fa margin-r-5"></i><?= h($teamsUsers->user_id) ?></strong>
                <p class="text-muted">
                  <?= h($teamsUsers->Role) ?>
                </p>
                <hr>
              <?php endforeach;?>
              <strong><i class="fa margin-r-5"></i><?= h('Actions') ?></strong>
              <p>
                <span class="label label-info"><?= $this->Html->link(__('View'), ['controller' => 'TeamsUsers', 'action' => 'view', $teamsUsers->team_id]) ?></span>
                <span class="label label-info"><?= $this->Html->link(__('Edit'), ['controller' => 'TeamsUsers', 'action' => 'edit', $teamsUsers->team_id]) ?></span>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamsUsers', 'action' => 'delete', $teamsUsers->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsUsers->team_id)]) ?>
              </p>
              <hr>
            <?php endif;?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
