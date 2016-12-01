<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admins Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Communes
 * @property \Cake\ORM\Association\HasMany $Emergencies
 * @property \Cake\ORM\Association\HasMany $Managers
 * @property \Cake\ORM\Association\HasMany $Missions
 *
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, callable $callback = null)
 */
class AdminsTable extends Table
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

        $this->table('admins');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Communes', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Emergencies', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Managers', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Missions', [
            'foreignKey' => 'admin_id'
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
            ->requirePresence('rut_admin', 'create')
            ->notEmpty('rut_admin');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('last_name_first', 'create')
            ->notEmpty('last_name_first');

        $validator
            ->requirePresence('last_name_second', 'create')
            ->notEmpty('last_name_second');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmpty('age');

        $validator
            ->requirePresence('residency', 'create')
            ->notEmpty('residency');

        $validator
            ->requirePresence('mail', 'create')
            ->notEmpty('mail');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
