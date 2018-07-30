<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class SuppliersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('admin');
    }
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Paginator');
        $suppliers = $this->Paginator->paginate($this->Suppliers->find());
        $this->set(compact('suppliers'));
    }
    public function details($id = null) {
        $this->viewBuilder()->setLayout('admin');
        $supplier = $this->Suppliers->get($id);
        $this->set(compact('supplier'));
    }
    public function create()
    {
        $this->viewBuilder()->setLayout('admin');
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('Supplier has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('supplier', $supplier);
    }
}