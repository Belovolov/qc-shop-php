<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;

class CategoriesCell extends Cell
{
    public function display($gender) 
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('
            select c.CategoryId, c.Name
            from categories c 
            where exists(select * from items i 
                        where i.CategoryId = c.CategoryId and (i.Gender=? or i.Gender="Unisex"))
        ', [$gender]);

        $genderSpecific = $stmt->fetchAll('assoc');

        // $this->loadModel('Categories');
        // $genderSpecific = $this
        //     ->Categories
        //     ->find()
        //     ->contain('Items', function ($q) {
        //             return $q
        //                 ->select(['Gender','CategoryId'])
        //                 ->where(['Items.Gender' => "Huesos"]);
        //         }
        //     )->all();

        // $genderSpecific = $this->Categories->find()
        //     ->contain('Items')
        //     ->where(['item.Gender'=>$gender])
        //     ->all();
        $this->set('categories', $genderSpecific);        
        $this->set('gender', $gender); 
    }

}
