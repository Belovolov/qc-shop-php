<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ShoppingCartSummary cell
 */
class ShoppingCartSummaryCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {

    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('ShoppingCartItems');
        $cartId =  $this->request->session()->read('CartId');
        if (!empty($cartId)) {
            $totalQuantity =  $this->ShoppingCartItems->find()
            ->where(['ShoppingCartId'=>$cartId])->count();
        }
        else {
            $totalQuantity = 0;
        }
        $this->set('totalQuantity', $totalQuantity);
    }
}
