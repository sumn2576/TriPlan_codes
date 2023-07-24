<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SanplesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SanplesTable Test Case
 */
class SanplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SanplesTable
     */
    protected $Sanples;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sanples',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sanples') ? [] : ['className' => SanplesTable::class];
        $this->Sanples = $this->getTableLocator()->get('Sanples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sanples);

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
}
