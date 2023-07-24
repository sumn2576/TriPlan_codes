<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fakeplan Entity
 *
 * @property int $id
 * @property string|null $plan_name
 * @property string|null $rural
 * @property string|null $image_pass
 *
 * @property \App\Model\Entity\FakeTravelSpot[] $fake_travel_spots
 * @property \App\Model\Entity\FakeTravelTag[] $fake_travel_tags
 */
class Fakeplan extends Entity
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
        'plan_name' => true,
        'rural' => true,
        'image_pass' => true,
        'fake_travel_spots' => true,
        'fake_travel_tags' => true,
    ];
}
