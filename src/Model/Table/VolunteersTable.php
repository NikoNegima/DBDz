<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;


/**
 * Volunteers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tasks
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Notifications
 * @property \Cake\ORM\Association\BelongsToMany $Communes
 * @property \Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\Volunteer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Volunteer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Volunteer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Volunteer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer findOrCreate($search, callable $callback = null)
 */
class VolunteersTable extends Table
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

        $this->table('volunteers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'volunteer_id'
        ]);
        $this->belongsToMany('Communes', [
            'foreignKey' => 'volunteer_id',
            'targetForeignKey' => 'commune_id',
            'joinTable' => 'communes_volunteers'
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'volunteer_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'skills_volunteers'
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
            ->requirePresence('rut_volunteer', 'create')
            ->notEmpty('rut_volunteer');

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

        $validator
            ->boolean('disponibility')
            ->requirePresence('disponibility', 'create')
            ->notEmpty('disponibility');

        $validator
            ->requirePresence('performance_area', 'create')
            ->notEmpty('performance_area');

        $validator
            ->integer('experience')
            ->requirePresence('experience', 'create')
            ->notEmpty('experience');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->requirePresence('actual_ubication', 'create')
            ->notEmpty('actual_ubication');

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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function saveNewVolunteer(array $volunteerData, int $user_id) {
        $volunteer = $this->newEntity();
        
        $volunteer->rut_volunteer = $volunteerData['rut'];
        $volunteer->user_id = $user_id;
        $volunteer->task_id = null;
        $volunteer->name = $volunteerData['name'];
        $volunteer->last_name_first = $volunteerData['last_name_first'];
        $volunteer->last_name_second = $volunteerData['last_name_second'];
        $volunteer->age = $volunteerData['age'];
        $volunteer->residency = $volunteerData['residency'];
        $volunteer->mail = $volunteerData['mail'];
        $volunteer->disponibility = true;
        $volunteer->performance_area = $volunteerData['performance_area'];
        $volunteer->actual_ubication = $volunteerData['actual_ubication'];
        $volunteer->phone = $volunteerData['phone'];  

        if($this->save($volunteer)) {
            return true;
        } else {
            return false;
        }

    }

    //Método que retorna los mensajes que le fueron enviados a un voluntario
    public function getMessages($id_volunteer){

        $connection = ConnectionManager::get('default');
        $result = $connection->execute('SELECT m.name, m.last_name_first, n.detail, n.urgency_level, n.subject, n.task_related
                                        FROM managers AS m
                                        INNER JOIN notifications AS n
                                        ON m.id = n.manager_id
                                        WHERE n.volunteer_id = :id_volunteer
                                        AND status = :status', ['id_volunteer' => $id_volunteer, 'status' => 1])->fetchAll('assoc');
        return $result;
    }
}
