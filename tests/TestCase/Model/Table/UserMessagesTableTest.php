<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsermessagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsermessagesTable Test Case
 */
class UsermessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsermessagesTable
     */
    protected $Usermessages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Usermessages',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Usermessages') ? [] : ['className' => UsermessagesTable::class];
        $this->Usermessages = $this->getTableLocator()->get('Usermessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Usermessages);

        parent::tearDown();
    }
}
