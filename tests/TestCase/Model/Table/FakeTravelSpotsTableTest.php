<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaketravelspotsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaketravelspotsTable Test Case
 */
class FaketravelspotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FaketravelspotsTable
     */
    protected $Faketravelspots;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Faketravelspots',
        'app.FakePlans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Faketravelspots') ? [] : ['className' => FaketravelspotsTable::class];
        $this->Faketravelspots = $this->getTableLocator()->get('Faketravelspots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Faketravelspots);

        parent::tearDown();
    }
}
