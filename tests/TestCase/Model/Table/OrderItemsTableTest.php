<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderItemsTable Test Case
 */
class OrderItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderItemsTable
     */
    public $OrderItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrderItems') ? [] : ['className' => OrderItemsTable::class];
        $this->OrderItems = TableRegistry::getTableLocator()->get('OrderItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderItems);

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
