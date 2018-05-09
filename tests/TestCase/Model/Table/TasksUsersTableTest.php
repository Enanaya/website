<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasksUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasksUsersTable Test Case
 */
class TasksUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TasksUsersTable
     */
    public $TasksUsers;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->TasksUsers->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->TasksUsers->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Tasks',
            'Users',
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->TasksUsers->associations()->has($assoc),
                "Cursory sanity check. The [App]Table table is expected to be associated with $assoc."
            );
        }
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new \Cake\Validation\Validator();
        $validator = $this->TasksUsers->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
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
            $this->TasksUsers->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
