<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderItemsFixture
 *
 */
class OrderItemsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'OrderItems';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'OrderID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ItemID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IX_OrderItems_ItemID' => ['type' => 'index', 'columns' => ['ItemID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['OrderID', 'ItemID'], 'length' => []],
            'FK_OrderItems_Items_ItemID' => ['type' => 'foreign', 'columns' => ['ItemID'], 'references' => ['items', 'ItemId'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'FK_OrderItems_Orders_OrderID' => ['type' => 'foreign', 'columns' => ['OrderID'], 'references' => ['orders', 'OrderID'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'OrderID' => 1,
                'ItemID' => 1,
                'Quantity' => 1
            ],
        ];
        parent::init();
    }
}
