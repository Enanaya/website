<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Users->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Users->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new \Cake\Validation\Validator();
        $validator = $this->Users->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('email'));
        $this->assertTrue($validator->hasField('First_Name'));
        $this->assertTrue($validator->hasField('Surname'));
        $this->assertTrue($validator->hasField('Department'));
        $this->assertTrue($validator->hasField('Job_Title'));
        $this->assertTrue($validator->hasField('Level'));
        $this->assertTrue($validator->hasField('password'));
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->assertInstanceOf(
            '\Cake\ORM\RulesChecker',
            $this->Users->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
