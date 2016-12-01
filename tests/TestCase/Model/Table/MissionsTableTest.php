<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MissionsTable Test Case
 */
class MissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MissionsTable
     */
    public $Missions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions',
        'app.managers',
        'app.users',
        'app.admins',
        'app.communes',
        'app.regions',
        'app.emergencies',
        'app.volunteers',
        'app.tasks',
        'app.notifications',
        'app.communes_volunteers',
        'app.skills',
        'app.skills_volunteers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Missions') ? [] : ['className' => 'App\Model\Table\MissionsTable'];
        $this->Missions = TableRegistry::get('Missions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Missions);

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
