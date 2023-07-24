<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoreSanplesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoreSanplesTable Test Case
 */
class MoreSanplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoreSanplesTable
     */
    protected $MoreSanples;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MoreSanples',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MoreSanples') ? [] : ['className' => MoreSanplesTable::class];
        $this->MoreSanples = $this->getTableLocator()->get('MoreSanples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MoreSanples);

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
