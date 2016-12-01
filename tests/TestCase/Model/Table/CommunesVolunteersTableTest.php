<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommunesVolunteersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommunesVolunteersTable Test Case
 */
class CommunesVolunteersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommunesVolunteersTable
     */
    public $CommunesVolunteers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.communes_volunteers',
        'app.communes',
        'app.admins',
        'app.users',
        'app.managers',
        'app.missions',
        'app.notifications',
        'app.skills',
        'app.tasks',
        'app.volunteers',
        'app.skills_volunteers',
        'app.emergencies',
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
        $config = TableRegistry::exists('CommunesVolunteers') ? [] : ['className' => 'App\Model\Table\CommunesVolunteersTable'];
        $this->CommunesVolunteers = TableRegistry::get('CommunesVolunteers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommunesVolunteers);

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
