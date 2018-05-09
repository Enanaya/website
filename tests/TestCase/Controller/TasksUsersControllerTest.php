<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TasksUsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\TasksUsersTable;
/**
 * App\Controller\TasksUsersController Test Case
 */
class TasksUsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tasks_users',
        'app.tasks',
        'app.projects',
        'app.users',
        'app.teams_users',
        'app.teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TasksUsers') ? [] : ['className' => TasksUsersTable::class];
        $this->TasksUsers = TableRegistry::get('TasksUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TasksUsers);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/tasksusers/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/tasksusers');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'id' => 1,
            'task_id' => 2,
            'user_id' => 1
        ];
        $data = [
            'id' => 1,
            'task_id' => 1,
            'user_id' => 1
        ];
        $this->post('/tasksusers/add', $data);
        $this->assertResponseSuccess();

        $tasksusers = TableRegistry::get('Tasksusers');
        $query = $tasksusers->find()->where(['task_id' => 1 ]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $id=1;
        $data = [
            'id' => 1,
            'task_id' => 3,
            'user_id' => 1
        ];
        $this->post('/tasksusers/add', $data);
        $this->assertResponseSuccess();

        $tasksusers = TableRegistry::get('Tasksusers');
        $query = $tasksusers->find()->where(['task_id' => 3 ]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $id='1';
        $this->post('/tasksusers/delete', $id);
        $this->assertResponseSuccess();

        $tasksusers = TableRegistry::get('TasksUsers');
        $query = $tasksusers->find()->where(['id' => 2]);
        $this->assertEquals(0, $query->count());
    }
}
