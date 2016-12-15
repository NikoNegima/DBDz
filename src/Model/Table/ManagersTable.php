<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;


/**
 * Managers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Admins
 * @property \Cake\ORM\Association\HasMany $Missions
 * @property \Cake\ORM\Association\HasMany $Notifications
 * @property \Cake\ORM\Association\HasMany $Skills
 * @property \Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Manager get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manager newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Manager[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manager|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manager findOrCreate($search, callable $callback = null)
 */
class ManagersTable extends Table
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

        $this->table('managers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Missions', [
            'foreignKey' => 'manager_id'
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'manager_id'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'manager_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'manager_id'
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
            ->requirePresence('rut_manager', 'create')
            ->notEmpty('rut_manager');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }

    //Método que retorna los mensajes que le fueron enviados a un encargado
    public function getMessages($id_manager){

        $connection = ConnectionManager::get('default');
        $result = $connection->execute('SELECT v.name, v.last_name_first, n.detail, n.urgency_level
                                        FROM volunteers AS v
                                        INNER JOIN notifications AS n
                                        ON v.id = n.volunteer_id
                                        WHERE n.manager_id = :id_manager
                                        AND status = :status', ['id_manager' => $id_manager, 'status' => 0])->fetchAll('assoc');
        debug($result);
        return $result;
    }
}
