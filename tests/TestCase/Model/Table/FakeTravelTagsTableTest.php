<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaketraveltagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaketraveltagsTable Test Case
 */
class FaketraveltagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FaketraveltagsTable
     */
    protected $Faketraveltags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Faketraveltags',
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
        $config = $this->getTableLocator()->exists('Faketraveltags') ? [] : ['className' => FaketraveltagsTable::class];
        $this->Faketraveltags = $this->getTableLocator()->get('Faketraveltags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Faketraveltags);

        parent::tearDown();
    }
}
