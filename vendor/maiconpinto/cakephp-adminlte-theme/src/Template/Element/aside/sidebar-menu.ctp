<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder'). DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
  ob_start();
  include_once $file;
  echo ob_get_clean();
} else {
  ?>
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview">
      <a href="<?= $this->Url->build(["controller" => "Projects", "action" => "index",]); ?>">
        <i class="fa fa-files-o"></i>
        <span>Projects</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right"><?= $total ?></span>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= $this->Url->build(["controller" => "Projects", "action" => "assigned",]); ?>"><i class="fa fa-circle-o"></i>My Projects</a></li>

        <li><a href="<?= $this->Url->build(["controller" => "Projects", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>New</a></li>

      </ul>
    </li>

    <li class="treeview">
      <a href="<?= $this->Url->build(["controller" => "Tasks", "action" => "index",]); ?>">
        <i class="fa fa-fw fa-map"></i>
        <span>Tasks</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right"></span>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= $this->Url->build(["controller" => "Tasks", "action" => "assigned",]); ?>"><i class="fa fa-circle-o"></i>My Tasks</a></li>

        <li><a href="<?= $this->Url->build(["controller" => "Tasks", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>New</a></li>
        <li><a href="<?= $this->Url->build(["controller" => "Tasks-Users", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>Assign Task to User</a></li>
        <li><a href="<?= $this->Url->build(["controller" => "Tasks-Users", "action" => "delete",]); ?>"><i class="fa fa-circle-o"></i>Assign Task to User</a></li>

      </ul>
    </li>

    <li class="treeview">
      <a href="<?= $this->Url->build(["controller" => "Users", "action" => "index",]); ?>">
        <i class="fa fa-fw fa-hand-grab-o"></i>
        <span>Users</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right"></span>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= $this->Url->build(["controller" => "Users", "action" => "index",]); ?>"><i class="fa fa-circle-o"></i>List</a></li>

        <li><a href="<?= $this->Url->build(["controller" => "Users", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>Create User</a></li>
        <li><a href="<?= $this->Url->build(["controller" => "Teams-Users", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>Assign User to Team</a></li>

      </ul>
    </li>

    <li class="treeview">
      <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "index",]); ?>">
        <i class="fa fa-fw fa-balance-scale"></i>
        <span>Teams</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right"></span>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= $this->Url->build(["controller" => "Teams", "action" => "index",]); ?>"><i class="fa fa-circle-o"></i>List</a></li>

        <li><a href="<?= $this->Url->build(["controller" => "Teams", "action" => "add",]); ?>"><i class="fa fa-circle-o"></i>New</a></li>
      </ul>
    </li>

  </ul>
<?php } ?>
