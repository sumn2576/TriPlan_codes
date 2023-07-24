<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlansTable Test Case
 */
class PlansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlansTable
     */
    protected $Plans;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Plans',
        'app.Users',
        'app.FavoriteItems',
        'app.TravelSpots',
        'app.TravelTags',
        'app.ValuComments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Plans') ? [] : ['className' => PlansTable::class];
        $this->Plans = $this->getTableLocator()->get('Plans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Plans);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
