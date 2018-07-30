<?php
namespace App\Utility;

use Cake\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class ShoppingCart
{
    public $cartId;
    private $context;
    private function __construct($context) {
        $this->context = $context;
    }

    public static function getCart($context, $session)
    {
        $_cartId =  $session->read('CartId');
        if (empty($_cartId)) {
            $_cartId = GUID();
            $session->write('CartId', $_cartId);
        }
        $cart = new ShoppingCart($context);
        $cart->cartId = $_cartId;
        return $cart;
    }
    public function getItems() 
    {
        return $this->context->ShoppingCartItems->find()
            ->where(['ShoppingCartId'=>$this->cartId])->contain(['Items'])->all();
    }

    public function AddToCart($itemId, $amount) {
        $shoppingCartItem =  $this->context->ShoppingCartItems->find()
            ->where(['ShoppingCartId'=>$this->cartId, 'ItemId'=> $itemId])->first();

        if (empty($shoppingCartItem))
        {
            $shoppingCartItem =  $this->context->ShoppingCartItems->newEntity([
                'ShoppingCartId' => $this->cartId,
                'ItemId' => $itemId,
                'Amount' => $amount
            ]);
        }
        else
        {
            $shoppingCartItem->Amount += $amount;
        }
        return $this->context->ShoppingCartItems->save($shoppingCartItem);
    }

    public function SetAmountInCart($itemId, $amount)
    {
        $shoppingCartItem =  $this->context->ShoppingCartItems->find()
            ->where(['ShoppingCartId'=>$this->cartId, 'ItemId'=> $itemId])->first();

        if (!empty($shoppingCartItem))
        {
            if ($amount >= 1)
            {
                $shoppingCartItem->Amount = $amount;
                $this->context->ShoppingCartItems->save($shoppingCartItem);
            }
            else
            {
                $this->RemoveFromCart($itemId);
            }
        }        
    }

    public function RemoveFromCart($itemId)
    {
        $shoppingCartItem =  $this->context->ShoppingCartItems->find()
            ->where(['ShoppingCartId'=>$this->cartId, 'ItemId'=> $itemId])->first();

        if (!empty($shoppingCartItem))
        {
            $this->context->ShoppingCartItems->delete($shoppingCartItem);
        }
    }
    public function getTotalPrice() {
        $total = 0;
        $lines = $this->getItems();
        foreach ($lines as $line) {
            $total+= $line->Amount * $line->item->Price;
        }
        return $total;
    }
    public function clear()
    {
        $this->context->ShoppingCartItems->deleteAll(['ShoppingCartId'=>$this->cartId]);
    }    
}