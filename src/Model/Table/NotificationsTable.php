<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Managers
 * @property \Cake\ORM\Association\BelongsTo $Volunteers
 *
 * @method \App\Model\Entity\Notification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notification findOrCreate($search, callable $callback = null)
 */
class NotificationsTable extends Table
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

        $this->table('notifications');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('detail');

        $validator
            ->integer('urgency_level')
            ->requirePresence('urgency_level', 'create')
            ->notEmpty('urgency_level');

        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->integer('task_related')
            ->allowEmpty('task_related');

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
        $rules->add($rules->existsIn(['volunteer_id'], 'Volunteers'));

        return $rules;
    }

    //Método que guarda un mensaje creado por un encargado en la Base de datos
    public function saveMessage(array $messageData, int $id_volunteer, int $id_manager, int $status, $subject){
        $notification = $this->newEntity();
        $notification->manager_id = $id_manager;
        $notification->volunteer_id = $id_volunteer;
        $notification->detail = $messageData['msj'];
        $notification->urgency_level = $messageData['gravedad'];
        $notification->subject = $subject;
        $notification->status = $status;

        if($this->save($notification)){
            return true;
        }
        else{
            return false;
        }
    }
}
