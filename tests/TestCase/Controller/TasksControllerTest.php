<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TasksController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\TasksTable;

/**
 * App\Controller\TasksController Test Case
 */
class TasksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tasks',
        'app.projects',
        'app.tasks_users',
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
        $config = TableRegistry::exists('Tasks') ? [] : ['className' => TasksTable::class];
        $this->Tasks = TableRegistry::get('Tasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tasks);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/tasks/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/task');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
//        $this->markTestIncomplete('Not implemented yet.');
        $data = [
            'id' => 2,
            'Description' => 'testDescription',
            'Start_Time' => '2018-04-05 00:02:49',
            'End_Date' => '2018-04-05 00:02:49',
            'Status' => 'testStatus',
            'project_id' => 1
        ];
        $this->post('/tasks/add', $data);
        $this->assertResponseSuccess();

        $tasks = TableRegistry::get('Tasks');
        $query = $tasks->find()->where(['id' => 1]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $id=2;
       $data = [
            'id' => 2,
            'Description' => 'testDescription',
            'Start_Time' => '2018-04-05 00:02:49',
            'End_Date' => '2018-04-05 00:02:49',
            'Status' => 'testEDIT',
            'project_id' => 1
        ];
        $this->post('/tasks/edit', $data);
        $this->assertResponseSuccess();

        $tasks = TableRegistry::get('Tasks');
        $query = $tasks->find()->where(['id' => $data['id']]);
        $this->assertEquals(1, $query->count());


    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $id='2';
        $this->post('/tasks/delete', $id);
        $this->assertResponseSuccess();

        $tasks = TableRegistry::get('Tasks');
        $query = $tasks->find()->where(['id' => 2]);
        $this->assertEquals(0, $query->count());
    }

}
