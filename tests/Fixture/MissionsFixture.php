<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MissionsFixture
 *
 */
class MissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'manager_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'emergency_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'admin_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mission_name' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'volunteer_amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'FK_DEFINE_DECLARA' => ['type' => 'index', 'columns' => ['admin_id'], 'length' => []],
            'FK_ES_ASIGNADO2' => ['type' => 'index', 'columns' => ['manager_id'], 'length' => []],
            'FK_SE_COMPONE_DE' => ['type' => 'index', 'columns' => ['emergency_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_DEFINE_DECLARA' => ['type' => 'foreign', 'columns' => ['admin_id'], 'references' => ['admins', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ES_ASIGNADO2' => ['type' => 'foreign', 'columns' => ['manager_id'], 'references' => ['managers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_SE_COMPONE_DE' => ['type' => 'foreign', 'columns' => ['emergency_id'], 'references' => ['emergencies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'manager_id' => 1,
            'emergency_id' => 1,
            'admin_id' => 1,
            'mission_name' => 'Lorem ip',
            'volunteer_amount' => 1,
            'status' => 'Lorem ip'
        ],
    ];
}
