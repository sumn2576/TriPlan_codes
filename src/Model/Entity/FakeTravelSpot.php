<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Faketravelspot Entity
 *
 * @property int $id
 * @property int $fake_plan_id
 * @property string|null $spot_name
 *
 * @property \App\Model\Entity\Fakeplan $fake_plan
 */
class Faketravelspot extends Entity
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
        'fake_plan_id' => true,
        'spot_name' => true,
        'fake_plan' => true,
    ];
}
