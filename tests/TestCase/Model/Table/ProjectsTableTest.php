<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsTable Test Case
 */
class ProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsTable
     */
    public $Projects;

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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Projects->initialize([]); // Have to call manually to get coverage.
        $this->assertEquals(
            'id',
            $this->Projects->primaryKey(),
            'The [App]Table default primary key is expected to be `id`.'
        );

        $expectedBehaviors = [
            'Timestamp',
        ];
        foreach ($expectedBehaviors as $behavior) {
            $this->assertTrue(
                $this->Projects->behaviors()->has($behavior),
                "Cursory sanity check. The [App]Table table is expected to use the $behavior behavior."
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
        $validator = $this->Projects->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('Name'));
        $this->assertTrue($validator->hasField('Status'));
        $this->assertTrue($validator->hasField('Deadline'));
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
            $this->Projects->buildRules(new \Cake\ORM\RulesChecker()),
            'Cursory sanity check. buildRules() should return a ruleChecker.'
        );
    }
}
