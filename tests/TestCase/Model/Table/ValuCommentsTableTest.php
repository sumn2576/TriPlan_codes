<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValucommentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValucommentsTable Test Case
 */
class ValucommentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ValucommentsTable
     */
    protected $Valucomments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Valucomments',
        'app.Users',
        'app.Plans',
        'app.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Valucomments') ? [] : ['className' => ValucommentsTable::class];
        $this->Valucomments = $this->getTableLocator()->get('Valucomments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Valucomments);

        parent::tearDown();
    }
}
