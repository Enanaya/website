<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProjectsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\ProjectsTable;
/**
 * App\Controller\ProjectsController Test Case
 */
class ProjectsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects',
        'app.tasks',
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
        $config = TableRegistry::exists('Projects') ? [] : ['className' => ProjectsTable::class];
        $this->Projects = TableRegistry::get('Projects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projects);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
//        $result = $this->testAction(
//            '/projects/index',
//            array('return' => 'vars', 'method' => 'get')
//        );
        $this->get('/projects/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/projects');
        $this->assertResponseSuccess();
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
            'Name' => 'testName',
            'Status' => 'testStatus',
            'created' => '2018-04-05 00:02:49',
            'Deadline' => '2018-04-05 00:02:49',
        ];
        $this->post('/projects/add', $data);

        $this->assertResponseSuccess();
        $projects = TableRegistry::get('Projects');
        $query = $projects->find()->where(['id' => $data['id']]);
        $this->assertEquals(1, $query->count());
//        foreach ($query as $temp ){
//            var_dump($temp);
//        }
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
            'Name' => 'testName',
            'Status' => 'test',
            'created' => '2018-04-05 00:02:49',
            'Deadline' => '2018-04-05 00:02:49',
        ];
        $this->post('/projects/edit', $data);
        $this->assertResponseSuccess();

        $projects = TableRegistry::get('Projects');
        $query = $projects->find()->where(['test' =>  1 ]);
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
        $this->post('/projects/delete', $id);
        $this->assertResponseSuccess();

        $projects = TableRegistry::get('projects');
        $query = $projects->find()->where(['id' => 1]);
        $this->assertEquals(0, $query->count());
    }
}
