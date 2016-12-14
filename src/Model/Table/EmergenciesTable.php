<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emergencies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Communes
 * @property \Cake\ORM\Association\BelongsTo $Admins
 * @property \Cake\ORM\Association\HasMany $Missions
 *
 * @method \App\Model\Entity\Emergency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Emergency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Emergency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Emergency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emergency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Emergency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Emergency findOrCreate($search, callable $callback = null)
 */
class EmergenciesTable extends Table
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

        $this->table('emergencies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Communes', [
            'foreignKey' => 'commune_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Missions', [
            'foreignKey' => 'emergency_id'
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
            ->requirePresence('date', 'create')
            ->notEmpty('date', 'Se requiere ingresar una fecha')
            ->add('date', 'format', [
                'rule' => ['date', 'ymd'],
                'message' => 'Se requiere ingresar una fecha valida en el formato correcto'
                ]);

        $validator
            ->requirePresence('place', 'create')
            ->notEmpty('place', 'Se requiere ingresar un lugar');

        $validator
            ->requirePresence('severity', 'create')
            ->notEmpty('severity');

        $validator
            ->allowEmpty('description', 'Se requiere ingresar una descripcion');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['commune_id'], 'Communes'));
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }
}
