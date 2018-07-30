<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'register','logoff']);
        $this->loadModel('Users');
        $this->loadModel('Orders');
    }   
    
    public function profile()
    {
        $this->Authorize(['customer']);
        $edit = false;
        $user = $this->Auth->user();
        $user = $this->Users->get($user['Id']);
        if ($this->request->is(['patch', 'post', 'put'])) {            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'profile']);
            }
            $edit = true;
        }
        else {            
            if (!empty($params['edit'])) {
                if ($params['edit']=="true") {
                    $edit = true;
                }
            }
        }
        $this->set('user', $user);
        $this->set('edit', $edit);        
    }

    public function orders()
    {
        $this->Authorize(['customer']);
        $user = $this->Auth->user();
        // get orders
        $orders = $this->Orders->find()->where(['CustomerID'=>$user['Id']]);
        $this->set('orders', $orders);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if (!$user['IsLocked']) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }                    
                else {
                    $this->Flash->error('Your account has been suspended');
                }    
            }
            else {
                $this->Flash->error('Your username or password is incorrect.');
            }            
        }
        $this->set("redirect", $this->Auth->redirectUrl());
    }

    public function register($returnUrl = null) {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('Email');
            if (!empty($email)) {
                $isEmailInUse = $this->Users->find()->where(['Email'=>$email])->count('*');
                if (!$isEmailInUse) {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    $user -> Role = 'customer';
                    if (empty($user -> UserName)) $user->UserName = $email;
                    $user -> EmailConfirmed = false;
                    $savedUser = $this->Users->save($user);
                    if ($savedUser) {
                        $this->Auth->setUser($savedUser);
                        $this->sendConfirmationLetter($savedUser);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                }
                else {
                    $this->Flash->error(__('The email is already in use'));
                }
            }
            else {
                $this->Flash->error(__('The email can not be empty'));
            }            
        }
        $this->set('user', $user);
        $this->set("redirect", $this->Auth->redirectUrl());
    }
    public function logoff() {
        return $this->redirect($this->Auth->logout());
    }

    public function ConfirmEmail() {
        $params = $this->request->getQueryParams();
        if (!empty($params['user'])) {
            $user = $params['user'];
        }
        if (!empty($params['token'])) {
            $token = $params['token'];
        }
        if (isset($token)&&isset($user)) {
            $user = $this->Users->get($user);
            if (!(empty($user))) {
                if ($user->EmailConfirmed) {
                    $this->Flash->default("The email is already confirmed");
                    return $this->redirect(['controller'=>'home', 'action'=>'index']);
                }
                else {
                    if ($user->ConfirmToken == $token) {
                        $user->EmailConfirmed = true;
                        $user->ConfirmToken = null;
                        if ($this->Users->save($user)) {
                            $this->Flash->success("Confirmation successfull");
                            return $this->redirect(['controller'=>'home', 'action'=>'index']);
                        }
                    }
                }                
            }
        }
        $this->Flash->error("Confirmation failed");
        return $this->redirect(['controller'=>'home', 'action'=>'index']);
    }

    private function sendConfirmationLetter($user) {
        //generate token
        $token = bin2hex(random_bytes(50));
        //send email
        $usr = $this->Users->patchEntity($user, ['ConfirmToken'=>$token]);
        if ($this->Users->save($usr)) {
            //get confirmation url
            $url = Router::url([
                'controller' => 'account', 
                'action' => 'ConfirmEmail', 
                'user' => $user->Id, 
                'token' => $token, 
                '_full' => true]);
            ///send email
            $email = new Email();
            $email->from(['roman.b.ch@yandex.ru' => 'Quality Caps'])
                ->to($user->Email)
                ->subject('Email confirmation - Quality Caps')
                ->emailFormat('html')
                ->send("Welcome to Quality caps! To confirm your email, follow the link: <a href='$url'>confirmation link</a> ");
        }
        
    }
}
