<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->


      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'user-image', 'alt' => 'User Image')); ?>
          <span class="hidden-xs"><?= $uid ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>

            <p>
              <?= $uid ?>
              <small></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-xs-6 text-center">
                <?php echo $this->Html->link('My Tasks',['controller'=>'tasks', 'action'=>'assigned'])?>
              </div>
              <div class="col-xs-6 text-center">
                <?php echo $this->Html->link('Team',['controller'=>'teams', 'action'=>'index'])?>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <?php echo $this->Html->link('Sign Out',['controller'=>'users', 'action'=>'logout'], ['class'=>'btn btn-default btn-flat'])?>

            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      
    </ul>
  </div>
</nav>
<?php
}
?>
