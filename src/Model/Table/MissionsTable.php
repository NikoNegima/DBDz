<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;


/**
 * Missions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Managers
 * @property \Cake\ORM\Association\BelongsTo $Emergencies
 * @property \Cake\ORM\Association\BelongsTo $Admins
 * @property \Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Mission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mission findOrCreate($search, callable $callback = null)
 */
class MissionsTable extends Table
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

        $this->table('missions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Emergencies', [
            'foreignKey' => 'emergency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'mission_id'
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
            ->requirePresence('mission_name', 'create')
            ->notEmpty('mission_name');

        $validator
            ->integer('volunteer_amount')
            ->requirePresence('volunteer_amount', 'create')
            ->notEmpty('volunteer_amount');

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
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));
        $rules->add($rules->existsIn(['emergency_id'], 'Emergencies'));
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }

    //Método que recupera las misiones asignadas a un encargado
    public function missionsPerManager($id_manager){
        $missions = $this->find()
                         ->where(['manager_id' => $id_manager]);
        return $missions;
    }

    //Método que recupera las emergencias y sus respectivas misiones
    public function emergenciesWithMissions($manager_id){

       $connection = ConnectionManager::get('default');
       $result = $connection->execute('SELECT e.name, m.mission_name, m.status
                                       FROM emergencies AS e, missions AS m, managers AS ma
                                       WHERE e.id = m.manager_id
                                       AND ma.id = m.manager_id
                                       AND ma.id = :id', ['id' => $manager_id])->fetchAll('assoc');
       return $result;

    }
}
