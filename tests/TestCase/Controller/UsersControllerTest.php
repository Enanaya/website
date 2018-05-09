<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use App\Model\Table\UsersTable;
/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.tasks_users',
        'app.tasks',
        'app.projects',
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
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }


    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users/index');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users');
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
            'email' => 'testemail@gmail.com',
            'First_Name' => 'ABC',
            'Surname' => 'CBA',
            'Department' => 'testDepartment',
            'Job_Title' => 'testJob_Title',
            'Level' => 'testLevel',
            'password' => 'testpassword',
        ];
        $this->post('/users/add', $data);
        $this->assertResponseSuccess();

        $tasks = TableRegistry::get('Users');
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
            'email' => 'testemail@gmail.com',
            'First_Name' => 'ABC',
            'Surname' => 'CBA',
            'Department' => 'testDepartment',
            'Job_Title' => 'testJob_Title',
            'Level' => 'test',
            'password' => 'testpassword',
        ];
        $this->post('/users/edit', $data);
        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['test' => 'test']);
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
        $this->post('/users/delete', $id);
        $this->assertResponseSuccess();

        $users = TableRegistry::get('users');
        $query = $users->find()->where(['id' => '1']);
        $this->assertEquals(0, $query->count());
    }
}
