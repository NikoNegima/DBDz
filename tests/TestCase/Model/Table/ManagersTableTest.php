<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManagersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManagersTable Test Case
 */
class ManagersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManagersTable
     */
    public $Managers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.managers',
        'app.users',
        'app.admins',
        'app.communes',
        'app.regions',
        'app.emergencies',
        'app.missions',
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
        $config = TableRegistry::exists('Managers') ? [] : ['className' => 'App\Model\Table\ManagersTable'];
        $this->Managers = TableRegistry::get('Managers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Managers);

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
