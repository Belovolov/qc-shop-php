<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class CategoriesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->Authorize(['admin']);
    }
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Paginator');
        $categories = $this->Paginator->paginate($this->Categories->find());
        $this->set(compact('categories'));
    }
    public function details($id = null) {
        $this->viewBuilder()->setLayout('admin');
        $category = $this->Categories->find('all',['CategoryId' => $id])->firstOrFail();
        $this->set(compact('category'));
    }
    public function create()
    {
        $this->viewBuilder()->setLayout('admin');
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your category.'));
        }
        $this->set('category', $category);
    }
}