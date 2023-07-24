<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $valu_comment_id
 * @property int $repoter
 * @property \Cake\I18n\FrozenTime $day
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ValuComment $valu_comment
 */
class Report extends Entity
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
        'valu_comment_id' => true,
        'repoter' => true,
        'day' => true,
        'user' => true,
        'valu_comment' => true,
    ];
}
