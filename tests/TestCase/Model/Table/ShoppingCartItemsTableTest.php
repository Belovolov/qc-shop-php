<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShoppingCartItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShoppingCartItemsTable Test Case
 */
class ShoppingCartItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShoppingCartItemsTable
     */
    public $ShoppingCartItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shopping_cart_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShoppingCartItems') ? [] : ['className' => ShoppingCartItemsTable::class];
        $this->ShoppingCartItems = TableRegistry::getTableLocator()->get('ShoppingCartItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShoppingCartItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
