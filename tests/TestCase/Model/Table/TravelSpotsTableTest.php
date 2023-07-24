<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TravelSpotsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TravelSpotsTable Test Case
 */
class TravelSpotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TravelSpotsTable
     */
    protected $TravelSpots;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TravelSpots',
        'app.Plans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TravelSpots') ? [] : ['className' => TravelSpotsTable::class];
        $this->TravelSpots = $this->getTableLocator()->get('TravelSpots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TravelSpots);

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
