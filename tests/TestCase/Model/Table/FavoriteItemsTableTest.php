<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoriteitemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoriteitemsTable Test Case
 */
class FavoriteitemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoriteitemsTable
     */
    protected $Favoriteitems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Favoriteitems',
        'app.Users',
        'app.Plans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Favoriteitems') ? [] : ['className' => FavoriteitemsTable::class];
        $this->Favoriteitems = $this->getTableLocator()->get('Favoriteitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Favoriteitems);

        parent::tearDown();
    }
}
