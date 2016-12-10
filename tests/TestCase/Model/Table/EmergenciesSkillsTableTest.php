<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmergenciesSkillsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmergenciesSkillsTable Test Case
 */
class EmergenciesSkillsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmergenciesSkillsTable
     */
    public $EmergenciesSkills;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emergencies_skills',
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
        $config = TableRegistry::exists('EmergenciesSkills') ? [] : ['className' => 'App\Model\Table\EmergenciesSkillsTable'];
        $this->EmergenciesSkills = TableRegistry::get('EmergenciesSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmergenciesSkills);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
