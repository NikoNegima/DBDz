<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasksToolsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasksToolsTable Test Case
 */
class TasksToolsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TasksToolsTable
     */
    public $TasksTools;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tasks_tools',
        'app.tasks',
        'app.managers',
        'app.users',
        'app.admins',
        'app.communes',
        'app.regions',
        'app.emergencies',
        'app.missions',
        'app.volunteers',
        'app.notifications',
        'app.communes_volunteers',
        'app.skills',
        'app.skills_volunteers',
        'app.tools'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TasksTools') ? [] : ['className' => 'App\Model\Table\TasksToolsTable'];
        $this->TasksTools = TableRegistry::get('TasksTools', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TasksTools);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
