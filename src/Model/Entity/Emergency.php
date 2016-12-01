<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Emergency Entity
 *
 * @property int $id
 * @property int $commune_id
 * @property int $admin_id
 * @property \Cake\I18n\Time $date
 * @property string $place
 * @property string $severity
 * @property string $description
 * @property string $status
 *
 * @property \App\Model\Entity\Commune $commune
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Mission[] $missions
 */
class Emergency extends Entity
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
