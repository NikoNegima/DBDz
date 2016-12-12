<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmergenciesneedSkills Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Emergencies
 * @property \Cake\ORM\Association\BelongsTo $Skills
 *
 * @method \App\Model\Entity\EmergenciesneedSkill get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmergenciesneedSkill findOrCreate($search, callable $callback = null)
 */
class EmergenciesneedSkillsTable extends Table
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

        $this->table('emergenciesneed_skills');
        $this->displayField('emergency_id');
        $this->primaryKey(['emergency_id', 'skill_id']);

        $this->belongsTo('Emergencies', [
            'foreignKey' => 'emergency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
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
        $rules->add($rules->existsIn(['emergency_id'], 'Emergencies'));
        $rules->add($rules->existsIn(['skill_id'], 'Skills'));

        return $rules;
    }
}
