<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShoppingCartItemsFixture
 *
 */
class ShoppingCartItemsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ShoppingCartItems';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ItemId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ShoppingCartId' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'IX_ShoppingCartItems_ShoppingCartId' => ['type' => 'index', 'columns' => ['ShoppingCartId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Id'], 'length' => []],
            'UQ_ShoppingCartItems' => ['type' => 'unique', 'columns' => ['ItemId', 'ShoppingCartId'], 'length' => []],
            'FK_ShoppingCartItems_Items_ItemId' => ['type' => 'foreign', 'columns' => ['ItemId'], 'references' => ['items', 'ItemId'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'Id' => 1,
                'Amount' => 1,
                'ItemId' => 1,
                'ShoppingCartId' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
