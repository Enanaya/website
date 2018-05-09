<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsUsersTable Test Case
 */
class TeamsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsUsersTable
     */
    public $TeamsUsers;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->TeamsUsers->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            ['team_id', 'user_id'],
            $this->TeamsUsers->primaryKey(),
            'The [App]Table default primary key is expected to be [\'team_id\', \'user_id\'].'
        );
        $expectedAssociations = [
            'Teams',
            'Users',
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->TeamsUsers->associations()->has($assoc),
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
        $validator = $this->TeamsUsers->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('Role'));
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
            $this->TeamsUsers->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
