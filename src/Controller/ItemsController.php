<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\I18n\Time;
use Cake\Filesystem\File;

class ItemsController extends AppController
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
        $items = $this->Paginator->paginate($this->Items->find()->contain(['Categories','Suppliers']));
        $this->set(compact('items'));
    }
    public function details($id = null) {
        $this->viewBuilder()->setLayout('admin');
        $this->set('id',$id);
        $item = $this->Items->find('all')->where(['ItemId' => $id])->contain(['Categories','Suppliers'])->firstOrFail();
        $this->set(compact('item'));
    }
    public function create()
    {
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('admin');
        $item = $this->Items->newEntity(); 
        if ($this->request->is('post')) {
            $imageFile = $this->request->getData('imageFile');
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($imageFile['size']>0)
            {
                $pieces = explode('.', $imageFile['name']);
                $ext = end($pieces);
                $fileName = GUID().'.'.$ext;
                $uploads = new Folder(WWW_ROOT . "img/caps");
                $result = move_uploaded_file($imageFile["tmp_name"], $uploads->pwd() . DS . $fileName);
                if ($result) $item['ImageUrl'] = "img/caps/" . $fileName;
            }
            $item['ArrivalDate'] = Time::now();
            if ($this->Items->save($item)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $categories = $this->Items->Categories->find('list', [
            'keyField' => 'CategoryId',
            'valueField' => 'Name'
        ]);
        $suppliers = $this->Items->Suppliers->find('list', [
            'keyField' => 'SupplierId',
            'valueField' => 'Name'
        ]);

        $this->set('categories', $categories);
        $this->set('suppliers', $suppliers);
        $this->set('item', $item);
    }
}