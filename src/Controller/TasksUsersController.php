<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TasksUsers Controller
 *
 * @property \App\Model\Table\TasksUsersTable $TasksUsers
 *
 * @method \App\Model\Entity\TasksUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Users']
        ];
        $tasksUsers = $this->paginate($this->TasksUsers);
        $this->set(compact('tasksUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Tasks User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tasksUser = $this->TasksUsers->get($id, [
            'contain' => ['Tasks', 'Users']
        ]);

        $this->set('tasksUser', $tasksUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tasksUser = $this->TasksUsers->newEntity();
        if ($this->request->is('post')) {
            $tasksUser = $this->TasksUsers->patchEntity($tasksUser, $this->request->getData());
            if ($this->TasksUsers->save($tasksUser)) {
                $this->Flash->success(__('The tasks user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tasks user could not be saved. Please, try again.'));
        }
        $tasks = $this->TasksUsers->Tasks->find('list', ['limit' => 200]);
        $users = $this->TasksUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('tasksUser', 'tasks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tasks User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tasksUser = $this->TasksUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tasksUser = $this->TasksUsers->patchEntity($tasksUser, $this->request->getData());
            if ($this->TasksUsers->save($tasksUser)) {
                $this->Flash->success(__('The tasks user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tasks user could not be saved. Please, try again.'));
        }
        $tasks = $this->TasksUsers->Tasks->find('list', ['limit' => 200]);
        $users = $this->TasksUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('tasksUser', 'tasks', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tasks User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tasksUser = $this->TasksUsers->get($id);
        if ($this->TasksUsers->delete($tasksUser)) {
            $this->Flash->success(__('The tasks user has been deleted.'));
        } else {
            $this->Flash->error(__('The tasks user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
