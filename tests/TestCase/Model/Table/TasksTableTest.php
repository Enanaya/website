<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasksTable Test Case
 */
class TasksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TasksTable
     */
    public $Tasks;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Tasks->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Tasks->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );
        $expectedAssociations = [
            'Projects',
        ];
        foreach ($expectedAssociations as $assoc) {
            $this->assertTrue(
                $this->Tasks->associations()->has($assoc),
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
        $validator = $this->Tasks->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('Description'));
        $this->assertTrue($validator->hasField('Start_Time'));
        $this->assertTrue($validator->hasField('End_Date'));
        $this->assertTrue($validator->hasField('Status'));
        $this->assertTrue($validator->hasField('Next_TaskID'));
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
            $this->Tasks->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
