<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manager Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $rut_manager
 * @property int $admin_id
 * @property string $name
 * @property string $last_name_first
 * @property string $last_name_second
 * @property int $age
 * @property string $residency
 * @property string $mail
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Mission[] $missions
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\Task[] $tasks
 */
class Manager extends Entity
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
