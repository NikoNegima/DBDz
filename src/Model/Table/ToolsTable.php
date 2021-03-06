<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tools Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Tasks
 *
 * @method \App\Model\Entity\Tool get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tool newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tool[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tool|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tool[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tool findOrCreate($search, callable $callback = null)
 */
class ToolsTable extends Table
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

        $this->table('tools');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Tasks', [
            'foreignKey' => 'tool_id',
            'targetForeignKey' => 'task_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
