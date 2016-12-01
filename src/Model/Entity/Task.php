<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property int $manager_id
 * @property int $mission_id
 * @property string $task_name
 * @property int $volunteer_amount
 * @property string $task_status
 * @property string $guide_doc
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Mission $mission
 * @property \App\Model\Entity\Volunteer[] $volunteers
 * @property \App\Model\Entity\Tool[] $tools
 */
class Task extends Entity
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
        'id' => false
    ];
}
