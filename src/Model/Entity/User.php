<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user_name
 * @property string|null $comment
 * @property string|null $icon
 * @property string|null $rural
 * @property string $mail
 * @property string $password_code
 *
 * @property \App\Model\Entity\Favoriteitem[] $favorite_items
 * @property \App\Model\Entity\Plan[] $plans
 * @property \App\Model\Entity\Report[] $reports
 * @property \App\Model\Entity\UserMessage[] $user_messages
 * @property \App\Model\Entity\ValuComment[] $valu_comments
 */
class User extends Entity
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
        'user_name' => true,
        'comment' => true,
        'icon' => true,
        'rural' => true,
        'mail' => true,
        'password_code' => true,
        'favorite_items' => true,
        'plans' => true,
        'reports' => true,
        'user_messages' => true,
        'valu_comments' => true,
    ];


    protected function _setPassword_code($password_code)
    {
        if (strlen($password_code) > 0) {
            return (new DefaultPasswordHasher)->hash($password_code);
        }
    }
}
