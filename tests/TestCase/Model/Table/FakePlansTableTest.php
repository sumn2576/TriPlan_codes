<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FakeplansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FakeplansTable Test Case
 */
class FakeplansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FakeplansTable
     */
    protected $Fakeplans;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Fakeplans',
        'app.FakeTravelSpots',
        'app.FakeTravelTags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fakeplans') ? [] : ['className' => FakeplansTable::class];
        $this->Fakeplans = $this->getTableLocator()->get('Fakeplans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Fakeplans);

        parent::tearDown();
    }
}
