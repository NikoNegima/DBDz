<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmergenciesneedSkillsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmergenciesneedSkillsTable Test Case
 */
class EmergenciesneedSkillsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmergenciesneedSkillsTable
     */
    public $EmergenciesneedSkills;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emergenciesneed_skills',
        'app.emergencies',
        'app.communes',
        'app.admins',
        'app.users',
        'app.managers',
        'app.missions',
        'app.tasks',
        'app.volunteers',
        'app.notifications',
        'app.communes_volunteers',
        'app.skills',
        'app.skills_volunteers',
        'app.tools',
        'app.tasks_tools',
        'app.regions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmergenciesneedSkills') ? [] : ['className' => 'App\Model\Table\EmergenciesneedSkillsTable'];
        $this->EmergenciesneedSkills = TableRegistry::get('EmergenciesneedSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmergenciesneedSkills);

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
