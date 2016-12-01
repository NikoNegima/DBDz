<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mission Entity
 *
 * @property int $id
 * @property int $manager_id
 * @property int $emergency_id
 * @property int $admin_id
 * @property string $mission_name
 * @property int $volunteer_amount
 * @property string $status
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Emergency $emergency
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Task[] $tasks
 */
class Mission extends Entity
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
