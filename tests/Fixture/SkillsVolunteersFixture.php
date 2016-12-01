<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsVolunteersFixture
 *
 */
class SkillsVolunteersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'volunteer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'skill_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'domain_degree' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_POSEE' => ['type' => 'index', 'columns' => ['skill_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['volunteer_id', 'skill_id'], 'length' => []],
            'FK_DECLARA' => ['type' => 'foreign', 'columns' => ['volunteer_id'], 'references' => ['volunteers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_POSEE' => ['type' => 'foreign', 'columns' => ['skill_id'], 'references' => ['skills', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'volunteer_id' => 1,
            'skill_id' => 1,
            'domain_degree' => 1
        ],
    ];
}
