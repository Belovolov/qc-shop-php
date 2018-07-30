<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;

define('ALL', 0);
define('ACTIVE', 1);
define('BLOCKED', 2);
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{    
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'register']);
        $this->viewBuilder()->setLayout('admin');
        $this->Authorize(['admin']);
    }   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $status = ALL;
        $params = $this->request->getQueryParams();
        if (!empty($params['status'])) {
            $status = (int)$params['status'];
        }
        $users = $this->Users->find();
        if ($status==ACTIVE) {
            $users = $users -> where(["IsLocked"=>0]);
        }
        else if ($status==BLOCKED) {
            $users = $users -> where(["IsLocked"=>1]);
        }
        $users = $this->paginate($users);
        $this->set(compact('users','status'));
        
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
        $user = $this->Users->get($id, [
            'contain' => ['Orders']
        ]);

        $user_orders = new Collection($user->orders);
        $wc = $user_orders->filter(function ($value) {
            return $value->Status == "Waiting";
        })->count();


        $this->set('user', $user);        
        $this->set('waitingCount', $wc);
    }

    public function block($id = null) 
    {
        if (!empty($id)) {
            $user = $this->Users->get($id);
            $user->IsLocked=true;
            $this->Users->save($user);
        }       
        return $this->redirect(['action' => 'index']);
    }

    public function unlock($id = null) 
    {
        if (!empty($id)) {
            $user = $this->Users->get($id);
            $user->IsLocked=false;
            $this->Users->save($user);
        }       
        return $this->redirect(['action' => 'index']);
    }
}
