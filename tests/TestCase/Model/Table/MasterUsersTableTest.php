<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterusersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterusersTable Test Case
 */
class MasterusersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterusersTable
     */
    protected $Masterusers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Masterusers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Masterusers') ? [] : ['className' => MasterusersTable::class];
        $this->Masterusers = $this->getTableLocator()->get('Masterusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Masterusers);

        parent::tearDown();
    }
}
