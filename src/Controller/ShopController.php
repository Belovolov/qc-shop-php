<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;

class ShopController extends AppController
{
    public $paginate = [
        'limit' => 20,
        'order' => [
            'Items.Name' => 'asc'
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Items');
        $this->loadModel('Categories');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {                
        $parts = explode('/', $this->request->url);
        $gender = ucfirst(end($parts));

        //setting defaults
        $searchQuery = '';
        $curr_category = 0;
        $itemsPerPage = 6;
        $sortOrder = "name_asc";
        
        //getting request params
        $params = $this->request->getQueryParams();
        if (!empty($params['itemsPerPage'])) {
            if (is_numeric($params['itemsPerPage'])) {
                $itemsPerPage=$params['itemsPerPage'];
            }
        }
        if (!empty($params['sortOrder'])) {
            if ($this->sort_valid($params['sortOrder'])) {
                $sortOrder=$params['sortOrder'];
            }
        }
        if (!empty($params['category'])) {
            $curr_category=$params['category'];
        } 
        if (!empty($params['searchQuery'])) {
            $searchQuery=$params['searchQuery'];
        }    

        //setting up pagination based on request
        $this-> paginate = [
            'limit' => $itemsPerPage,
            'order' => $this->sort_order_decode($sortOrder)
        ];
        
        //querying items with filter
        $items = $this -> Items -> find() 
            -> where(['Gender'=>$gender])->orWhere(['Gender'=>"Unisex"]);                
        
        if (!empty($curr_category)) {
            $items = $items -> where(['CategoryId'=>$curr_category]);
        }

        if (!empty($searchQuery)) {
            $items = $items
                ->where(["Items.Name LIKE '%$searchQuery%'"]);
        }

        //finally handling min and max price
        $minScalePrice = $items->min(function ($min) {
            return $min->Price;
        })->Price;        
        $minPrice = $minScalePrice;        
        if (!empty($params['minPrice'])) {
            if (is_numeric($params['minPrice'])) {
                $minPrice=$params['minPrice'];
            }
        }
        
        $maxScalePrice = $items->max(function ($max) {
            return $max->Price;
        })->Price;
        $maxPrice = $maxScalePrice;
        if (!empty($params['maxPrice'])) {
            if (is_numeric($params['maxPrice'])) {
                $maxPrice=$params['maxPrice'];
            }
        }

        if ($minPrice > $minScalePrice) {
            $items = $items -> where(["Items.Price>=$minPrice"]);
        }

        if ($maxPrice < $maxScalePrice) {
            $items = $items -> where(["Items.Price<=$maxPrice"]);
        }

        if (!empty($params['maxPrice'])) {
            if (is_numeric($params['maxPrice'])) {
                $maxPrice=$params['maxPrice'];
            }
        }
        
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('
            select c.CategoryId, c.Name
            from categories c 
            where exists(select * from items i 
                        where i.CategoryId = c.CategoryId and (i.Gender=? or i.Gender="Unisex"))
        ', [$gender]);

        $categories = $stmt->fetchAll('assoc');

        $this->loadComponent('Paginator');
        //$items = $this->Paginator->paginate($this->Items->find()->contain(['Categories','Suppliers']));
        $this->set('items', $this->paginate($items));
        $this->set('gender', $gender);
        $this->set('categories', $categories);
        $this->set('itemsTotal', $items->count('*'));
        $this->set("curr_category", $curr_category);
        $this->set("searchQuery", $searchQuery);
        $this->set(compact('activeCategory', 'minScalePrice', 'maxScalePrice', 'minPrice', 'maxPrice', 'itemsPerPage','sortOrder'));
    }
    public function details($id = null) {
        $this->set('id',$id);
        $item = $this->Items->find('all')->where(['ItemId' => $id])->contain(['Categories','Suppliers'])->firstOrFail();
        $this->set(compact('item'));
    }

    private function sort_valid($sort) {
        return in_array($sort, ['name_asc', 'name_desc','price_asc','price_desc']);
    }
    private function sort_order_decode($sort) {
        switch ($sort) {
            case "name_desc":
                return ['Items.Name'=>'desc'];
            case "name_asc":
                return ['Items.Name'=>'asc'];
            case "price_desc":
                return ['Items.Price'=>'desc'];
            case "price_asc":
                return ['Items.Price'=>'asc'];
            default:
                return ['Items.Name'=>'asc'];
        }
    }
}