<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mastermessage Entity
 *
 * @property int $id
 * @property int $master_id
 * @property string $contact
 * @property \Cake\I18n\FrozenTime $day
 *
 * @property \App\Model\Entity\MasterUser $master_user
 */
class Mastermessage extends Entity
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
        'master_id' => true,
        'contact' => true,
        'day' => true,
        'master_user' => true,
    ];
}
