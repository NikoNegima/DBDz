<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TasksToolsFixture
 *
 */
class TasksToolsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'task_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tool_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_SE_OCUPA' => ['type' => 'index', 'columns' => ['tool_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['task_id', 'tool_id'], 'length' => []],
            'FK_SE_OCUPA' => ['type' => 'foreign', 'columns' => ['tool_id'], 'references' => ['tools', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_TIENE' => ['type' => 'foreign', 'columns' => ['task_id'], 'references' => ['tasks', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'task_id' => 1,
            'tool_id' => 1
        ],
    ];
}
