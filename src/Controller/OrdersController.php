<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use App\Utility\ShoppingCart;

define('ALL', 0);
define('WAITING', 1);
define('SHIPPED', 2);
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['checkoutcomplete']);
        $this->loadModel('ShoppingCartItems');
        $this->loadModel('OrderItems');
        $this->loadModel('Orders');
        $this->loadModel('Items');
        $this->loadModel('Users');
        $this->_shoppingCart = ShoppingCart::getCart($this, $this->request->session());
    }   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->Authorize(['admin']);
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Paginator');

        $status = ALL;
        $params = $this->request->getQueryParams();
        if (!empty($params['status'])) {
            $status = (int)$params['status'];
        }
        $orders = $this->Orders->find()->contain(['Users']);
        if ($status==WAITING) {
            $orders = $orders -> where(["Status"=>"Waiting"]);
        }
        else if ($status==SHIPPED) {
            $orders = $orders -> where(["Status"=>"Shipped"]);
        }
        $this->paginate = [
            'limit' => 10,
            'order' => ['Orders.Date'=>'desc']
        ];
        $orders = $this->paginate($orders);
        $this->set(compact('orders','status'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function details($id = null)
    {
        $this->Authorize(['admin']);
        $this->viewBuilder()->setLayout('admin');
        $order = $this->Orders->get($id, [
            'contain' => ['Users','OrderItems'=>['Items']]
        ]);
        $this->set('order', $order);
    }

    public function MarkShipped($id = null) 
    {
        $this->Authorize(['admin']);
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        $order->Status="Shipped";
        $this->Orders->save($order);
        return $this->redirect(['controller'=>'orders', 'action'=>'index']);
    }

    public function checkout()
    {
        $this->Authorize(['customer']);
        $step=1;
        $params = $this->request->getQueryParams();
        if (!empty($params['step'])) {
            $step = (int)$params['step'];
        }
        $user = $this->Auth->user();  
        
        if ($step==1)
        {
            return $this->redirect([ 
                'action' => 'ConfirmDetails']); 
        }
        else if ($step==2)
        {            
            $items = $this->_shoppingCart->getItems();
            //_shoppingCart.ShoppingCartItems = items;
            $order = $this->Orders->newEntity([
                'Status' => 'Waiting',
                'Date' => Time::now(),
                'Subtotal' => $this->_shoppingCart->getTotalPrice(),
                'GST'=> 15,
                'GrandTotal' => round((double)$this->_shoppingCart->getTotalPrice() * 1.15, 2),
                'CustomerID' => $user['Id']
            ]);
            $savedOrder = $this->Orders->save($order);
            if ($savedOrder)
            {
                foreach ($items as $item)
                {
                    $orderItem = $this->OrderItems->newEntity([
                        'ItemID' => $item->item->ItemId,
                        'Quantity' => $item->Amount,
                        'OrderID' => $savedOrder->OrderID
                    ]);
                    if ($this->OrderItems->save($orderItem)) {
                        continue;
                    }
                    else {
                        //cleaning all previous records
                        $this->OrderItems->deleteAll(['OrderId'=>$savedOrder->OrderId]);
                        $this->Orders->delete($savedOrder);
                        return $this->redirect(['controller'=>'shoppingcart', 'action'=>'index']);
                    }
                }
                $this->_shoppingCart->clear();
                return $this->redirect(['action'=>'CheckoutComplete']);                
            }
        }            
        return $this->redirect(['controller'=>'home','action'=>'error']);
    }
    public function confirmDetails() {
        $this->Authorize(['customer']);
        $user = $this->Auth->user();
        $customer = $this->Users->get($user['Id']);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            try {
                $customer = $this->Users->patchEntity($customer, $this->request->getData());
                if ($this->Users->save($customer)) 
                {
                    return $this->redirect(['action' => 'checkout', 'step'=>2]);
                }
            }
            catch (Exception $e) {
                return $this->redirect(['controller'=>'home', 'action' => 'error']);
            }
        }
        $this->set('customer', $customer);
    }

    public function CheckoutComplete()
    {
    }
}
