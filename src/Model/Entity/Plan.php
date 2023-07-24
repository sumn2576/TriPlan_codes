<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity
 *
 * @property int $user_id
 * @property int $id
 * @property string $plan_name
 * @property string $rural
 * @property string|null $image_pass
 * @property \Cake\I18n\FrozenTime $day
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Favoriteitem[] $favorite_items
 * @property \App\Model\Entity\TravelSpot[] $travel_spots
 * @property \App\Model\Entity\TravelTag[] $travel_tags
 * @property \App\Model\Entity\ValuComment[] $valu_comments
 */
class Plan extends Entity
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
        'plan_name' => true,
        'rural' => true,
        'image_pass' => true,
        'day' => true,
        'user' => true,
        'favorite_items' => true,
        'travel_spots' => true,
        'travel_tags' => true,
        'valu_comments' => true,
    ];
}
