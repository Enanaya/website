<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsTable Test Case
 */
class TeamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsTable
     */
    public $Teams;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Teams->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Teams->primaryKey(),
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
        $validator = $this->Teams->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('Name'));
        $this->assertTrue($validator->hasField('Description'));
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
            $this->Teams->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
