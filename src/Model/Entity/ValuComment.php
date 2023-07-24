<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Valucomment Entity
 *
 * @property int $user_id
 * @property int $plan_id
 * @property int $id
 * @property int $valu
 * @property \Cake\I18n\FrozenTime $created
 * @property string $impression
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Plan $plan
 * @property \App\Model\Entity\Report[] $reports
 */
class Valucomment extends Entity
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
        'user_id' => true,
        'plan_id' => true,
        'valu' => true,
        'created' => true,
        'impression' => true,
        'user' => true,
        'plan' => true,
        'reports' => true,
    ];
}
