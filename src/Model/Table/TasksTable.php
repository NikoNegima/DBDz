<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Managers
 * @property \Cake\ORM\Association\BelongsTo $Missions
 * @property \Cake\ORM\Association\HasMany $Volunteers
 * @property \Cake\ORM\Association\BelongsToMany $Tools
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null)
 */
class TasksTable extends Table
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

        $this->table('tasks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Missions', [
            'foreignKey' => 'mission_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Volunteers', [
            'foreignKey' => 'task_id'
        ]);
        $this->belongsToMany('Tools', [
            'foreignKey' => 'task_id',
            'targetForeignKey' => 'tool_id',
            'joinTable' => 'tasks_tools'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('task_name', 'create')
            ->notEmpty('task_name');

        $validator
            ->integer('volunteer_amount')
            ->requirePresence('volunteer_amount', 'create')
            ->notEmpty('volunteer_amount');

        $validator
            ->requirePresence('task_status', 'create')
            ->notEmpty('task_status');

        $validator
            ->requirePresence('guide_doc', 'create')
            ->notEmpty('guide_doc');

        return $validator;
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
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));
        $rules->add($rules->existsIn(['mission_id'], 'Missions'));

        return $rules;
    }
}
