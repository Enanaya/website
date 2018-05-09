<?php

namespace App\Test\TestCase\Controller;

use App\Controller\TeamsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\TeamsTable;

/**
 * App\Controller\TeamsController Test Case
 */
class TeamsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams',
        'app.teams_users',
        'app.users',
        'app.tasks_users',
        'app.tasks',
        'app.projects'
    ];


    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Teams') ? [] : ['className' => TeamsTable::class];
        $this->Teams = TableRegistry::get('Teams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Teams);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/teams/index');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/teams');
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
            'Name' => 'testName',
        ];
        $this->post('/teams/add', $data);
        $this->assertResponseSuccess();

        $tasks = TableRegistry::get('Teams');
        $query = $tasks->find()->where(['id' => $data['id']]);
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
            'name' => 'test',
        ];
        $this->post('/teams/edit', $data);
        $this->assertResponseSuccess();

        $teams = TableRegistry::get('Teams');
        $query = $teams->find()->where(['name' => 'test']);
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
        $this->post('/teams/delete', $id);
        $this->assertResponseSuccess();

        $teams = TableRegistry::get('teams');
        $query = $teams->find()->where(['id' => '1']);
        $this->assertEquals(0, $query->count());
    }
}
