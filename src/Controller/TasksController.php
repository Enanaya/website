<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Controller\Component;
use Cake\Event\EventDispatcherTrait;

/**
* Tasks Controller
*
* @property \App\Model\Table\TasksTable $Tasks
*
* @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class TasksController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Http\Response|void
  */
  public function index()
  {
    $currentUser = $this->Auth->user('id');
    $user = TableRegistry::get('TasksUsers');
    $query = $user->find('all');
    $query->contain(['Tasks', 'Users']);

    $this->paginate = [
      'contain' => ['Projects']
    ];
    $tasks = $this->paginate($this->Tasks);
    $this->set(compact('tasks'));

    $this->set('query', $query);
    $this->set('currentUser', $currentUser);
  }

  /**
  * View method
  *
  * @param string|null $id Task id.
  * @return \Cake\Http\Response|void
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $task = $this->Tasks->get($id, [
      'contain' => ['Projects', 'TasksUsers']
    ]);

    $this->set('task', $task);
  }

  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $TasksUsers = TableRegistry::get('TasksUsers');
    $task = $this->Tasks->newEntity();
    if ($this->request->is('post')){
      $data = ['task_id' => 'id' ,'8' => '2'];
      $taskuser = $TasksUsers->newEntity($data, [
        'associated' => ['Tasks', 'Users']
      ]);
      $TasksUsers->save($taskuser);
    }
    if ($this->request->is('post')) {

      $task = $this->Tasks->patchEntity($task, $this->request->getData());

      if ($this->Tasks->save($task)) {
        $this->Flash->success(__('The task has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The task could not be saved. Please, try again.'));

    }
    $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
    $users = $this->Tasks->TasksUsers->Users->find('list', ['limit' => 200]);
    $this->set(compact('task', 'projects', 'users', 'entity'));
  }

  /**
  * Edit method
  *
  * @param string|null $id Task id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $task = $this->Tasks->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $task = $this->Tasks->patchEntity($task, $this->request->getData());
      if ($this->Tasks->save($task)) {
        $this->Flash->success(__('The task has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The task could not be saved. Please, try again.'));
    }
    $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
    $this->set(compact('task', 'projects'));
  }

  /**
  * Delete method
  *
  * @param string|null $id Task id.
  * @return \Cake\Http\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $task = $this->Tasks->get($id);
    if ($this->Tasks->delete($task)) {
      $this->Flash->success(__('The task has been deleted.'));
    } else {
      $this->Flash->error(__('The task could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
  public function assigned(){
    $currentUser = $this->Auth->user('id');
    $user = TableRegistry::get('TasksUsers');
    $query = $user->find('all');
    $query->contain(['Tasks', 'Users']);
    ////

    ///
    $this->set('query', $query);
    $this->set('currentUser', $currentUser);
  }
  public function isAuthorized($user)
  {
      // All registered users can add articles
      // Prior to 3.4.0 $this->request->param('action') was used.
      if ($this->request->getParam('action') === 'assigned') {
          return true;
      }
      return parent::isAuthorized($user);
  }
}
