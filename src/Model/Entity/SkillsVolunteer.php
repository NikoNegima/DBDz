<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SkillsVolunteer Entity
 *
 * @property int $volunteer_id
 * @property int $skill_id
 * @property int $domain_degree
 *
 * @property \App\Model\Entity\Volunteer $volunteer
 * @property \App\Model\Entity\Skill $skill
 */
class SkillsVolunteer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'volunteer_id' => false,
        'skill_id' => false
    ];
}
