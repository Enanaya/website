<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TeamsUsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\TeamsUsersTable;
/**
 * App\Controller\TeamsUsersController Test Case
 */
class TeamsUsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams_users',
        'app.teams',
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
        $config = TableRegistry::exists('TeamsUsers') ? [] : ['className' => TeamsUsersTable::class];
        $this->TeamsUsers = TableRegistry::get('TeamsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamsUsers);

        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/teamsusers/index');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/teamsusers');
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
            'id' => 2,
            'team_id' => 2,
            'user_id' => 2,
            'Role' => 'testRole',
        ];
        $this->post('/teamsusers/add', $data);
        $this->assertResponseSuccess();

        $teamsusers = TableRegistry::get('TeamsUsers');
        $query = $teamsusers->find()->where(['id' => $data['id']]);
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
            'team_id' => 2,
            'user_id' => 2,
            'Role' => 'test',
        ];
        $this->post('/teamsusers/edit', $data);
        $this->assertResponseSuccess();

        $teamsusers = TableRegistry::get('TeamsUsers');
        $query = $teamsusers->find()->where(['Role' => 'test']);
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
        $this->post('/teamsusers/delete', $id);
        $this->assertResponseSuccess();

        $teamsusers = TableRegistry::get('teamsusers');
        $query = $teamsusers->find()->where(['id' => '2']);
        $this->assertEquals(0, $query->count());
    }
}
