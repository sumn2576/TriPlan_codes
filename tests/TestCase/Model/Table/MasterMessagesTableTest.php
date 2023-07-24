<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MastermessagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MastermessagesTable Test Case
 */
class MastermessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MastermessagesTable
     */
    protected $Mastermessages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Mastermessages',
        'app.MasterUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Mastermessages') ? [] : ['className' => MastermessagesTable::class];
        $this->Mastermessages = $this->getTableLocator()->get('Mastermessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Mastermessages);

        parent::tearDown();
    }
}
