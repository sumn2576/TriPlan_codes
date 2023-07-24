<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MastrUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MastrUsersTable Test Case
 */
class MastrUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MastrUsersTable
     */
    protected $MastrUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MastrUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MastrUsers') ? [] : ['className' => MastrUsersTable::class];
        $this->MastrUsers = $this->getTableLocator()->get('MastrUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MastrUsers);

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
