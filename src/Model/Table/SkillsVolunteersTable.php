<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkillsVolunteers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Volunteers
 * @property \Cake\ORM\Association\BelongsTo $Skills
 *
 * @method \App\Model\Entity\SkillsVolunteer get($primaryKey, $options = [])
 * @method \App\Model\Entity\SkillsVolunteer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SkillsVolunteer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkillsVolunteer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SkillsVolunteer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsVolunteer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsVolunteer findOrCreate($search, callable $callback = null)
 */
class SkillsVolunteersTable extends Table
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

        $this->table('skills_volunteers');
        $this->displayField('volunteer_id');
        $this->primaryKey(['volunteer_id', 'skill_id']);

        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
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
            ->integer('domain_degree')
            ->requirePresence('domain_degree', 'create')
            ->notEmpty('domain_degree');

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
        $rules->add($rules->existsIn(['volunteer_id'], 'Volunteers'));
        $rules->add($rules->existsIn(['skill_id'], 'Skills'));

        return $rules;
    }
}
