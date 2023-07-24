<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usermessage Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $contact
 * @property \Cake\I18n\FrozenTime $day
 *
 * @property \App\Model\Entity\User $user
 */
class Usermessage extends Entity
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
        'title' => true,
        'contact' => true,
        'day' => true,
        'user' => true,
    ];
}
