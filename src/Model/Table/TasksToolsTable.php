<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TasksTools Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tasks
 * @property \Cake\ORM\Association\BelongsTo $Tools
 *
 * @method \App\Model\Entity\TasksTool get($primaryKey, $options = [])
 * @method \App\Model\Entity\TasksTool newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TasksTool[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TasksTool|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TasksTool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TasksTool[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TasksTool findOrCreate($search, callable $callback = null)
 */
class TasksToolsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tasks_tools');
        $this->displayField('task_id');
        $this->primaryKey(['task_id', 'tool_id']);

        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tools', [
            'foreignKey' => 'tool_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        $rules->add($rules->existsIn(['tool_id'], 'Tools'));

        return $rules;
    }
}
