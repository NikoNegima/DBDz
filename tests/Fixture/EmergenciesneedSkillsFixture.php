<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmergenciesneedSkillsFixture
 *
 */
class EmergenciesneedSkillsFixture extends TestFixture
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
        '_indexes' => [
            'skill_id' => ['type' => 'index', 'columns' => ['skill_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['emergency_id', 'skill_id'], 'length' => []],
            'tiene' => ['type' => 'foreign', 'columns' => ['skill_id'], 'references' => ['skills', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'tiene2' => ['type' => 'foreign', 'columns' => ['emergency_id'], 'references' => ['emergencies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'skill_id' => 1
        ],
    ];
}
