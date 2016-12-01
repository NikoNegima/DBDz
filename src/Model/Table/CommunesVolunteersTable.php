<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CommunesVolunteers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Communes
 * @property \Cake\ORM\Association\BelongsTo $Volunteers
 *
 * @method \App\Model\Entity\CommunesVolunteer get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommunesVolunteer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CommunesVolunteer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommunesVolunteer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommunesVolunteer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommunesVolunteer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommunesVolunteer findOrCreate($search, callable $callback = null)
 */
class CommunesVolunteersTable extends Table
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

        $this->table('communes_volunteers');
        $this->displayField('commune_id');
        $this->primaryKey(['commune_id', 'volunteer_id']);

        $this->belongsTo('Communes', [
            'foreignKey' => 'commune_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
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
        $rules->add($rules->existsIn(['commune_id'], 'Communes'));
        $rules->add($rules->existsIn(['volunteer_id'], 'Volunteers'));

        return $rules;
    }
}
