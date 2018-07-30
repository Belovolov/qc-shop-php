<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Table;


class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
        // $this->addBehavior('Timestamp');
        $this->hasMany('Items')
            ->setForeignKey('CategoryId');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('Name')
            ->minLength('Name', 2)
            ->maxLength('Name', 50);

        return $validator;
    }
}