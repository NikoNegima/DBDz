<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VolunteersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VolunteersController Test Case
 */
class VolunteersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.volunteers',
        'app.tasks',
        'app.users',
        'app.admins',
        'app.communes',
        'app.communes_volunteers',
        'app.emergencies',
        'app.managers',
        'app.missions',
        'app.notifications',
        'app.skills',
        'app.skills_volunteers'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
