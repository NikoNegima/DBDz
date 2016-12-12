<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmergenciesSkillsFixture
 *
 */
class EmergenciesSkillsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'emergency_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'skill_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        '_indexes' => [
            'emergency_id' => ['type' => 'index', 'columns' => ['emergency_id'], 'length' => []],
            'skill_id' => ['type' => 'index', 'columns' => ['skill_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'emergencies_skills_ibfk_1' => ['type' => 'foreign', 'columns' => ['skill_id'], 'references' => ['skills', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'emergencies_skills_ibfk_2' => ['type' => 'foreign', 'columns' => ['emergency_id'], 'references' => ['emergencies', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'emergency_id' => 1,
            'skill_id' => 1,
            'id' => 1
        ],
    ];
}
