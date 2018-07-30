<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\Log\Log;

class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->Auth->deny('admin');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }
    public function index() {
        Log::info('(This is the message to show how logging works) Home page visited!', ['scope' => ['playing']]);
    }
    public function about() {
    }
    public function contact() {
    }
    public function error() {
    }
    public function admin() {
        $this->Authorize(['admin']);
        $this->viewBuilder()->setLayout('admin');
    }
}