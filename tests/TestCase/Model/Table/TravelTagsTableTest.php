<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TravelTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TravelTagsTable Test Case
 */
class TravelTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TravelTagsTable
     */
    protected $TravelTags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TravelTags',
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
        $config = $this->getTableLocator()->exists('TravelTags') ? [] : ['className' => TravelTagsTable::class];
        $this->TravelTags = $this->getTableLocator()->get('TravelTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TravelTags);

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
