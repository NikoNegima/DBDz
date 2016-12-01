<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommunesVolunteersFixture
 *
 */
class CommunesVolunteersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'commune_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'volunteer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_DECLARA_2' => ['type' => 'index', 'columns' => ['volunteer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['commune_id', 'volunteer_id'], 'length' => []],
            'FK_DECLARA_' => ['type' => 'foreign', 'columns' => ['commune_id'], 'references' => ['communes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_DECLARA_2' => ['type' => 'foreign', 'columns' => ['volunteer_id'], 'references' => ['volunteers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'commune_id' => 1,
            'volunteer_id' => 1
        ],
    ];
}
