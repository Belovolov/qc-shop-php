<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\ShoppingCart;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShoppingCartController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Items');
        $this->loadModel('ShoppingCartItems');
        $this->_shoppingCart = ShoppingCart::getCart($this, $this->request->session());
    }   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lines = $this->_shoppingCart->getItems();
        $total = $this->_shoppingCart->getTotalPrice();
        $this->set('lines', $lines);
        $this->set('total', $total);
    }
    
    public function AddToShoppingCart()
    {
        $amount = 1;
        //parse params
        $params = $this->request->getQueryParams();
        if (!empty($params['itemId'])) {
            $itemId=(int)$params['itemId'];
        }
        if (!empty($params['amount'])) {
            $amount=(int)$params['amount'];
        }
        if (!empty($itemId) && $amount>=1) {            
            if ($this->_shoppingCart->AddToCart($itemId, $amount)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your item to the cart. Try again'));            
        }
        return $this->redirect(['action'=>'index']);
    }
    public function SetAmountInCart()
    {
        $amount = -1;
        $params = $this->request->getQueryParams();
        if (!empty($params['itemId'])) {
            $itemId=(int)$params['itemId'];
        }
        if (!empty($params['amount'])) {
            $amount=(int)$params['amount'];
        }
        if (!empty($itemId) && $amount>=0) {            
            $this->_shoppingCart->SetAmountInCart($itemId, $amount);         
        }
        return $this->redirect(['action' => 'index']);
    }

    public function RemoveFromShoppingCart()
    {
        $params = $this->request->getQueryParams();
        if (!empty($params['itemId'])) {
            $itemId=(int)$params['itemId'];
        }
        if (!empty($itemId))
        {
            $this->_shoppingCart->RemoveFromCart($itemId);
        }
        return $this->redirect(['action' => 'index']);
    }
    public function ClearShoppingCart()
    {
        $this->_shoppingCart->clear();
        return $this->redirect(['action' => 'index']);
    }
}
