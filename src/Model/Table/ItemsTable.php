<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Validation;

class ItemsTable extends Table
{
    public function initialize(array $config)
    {
        // $this->addBehavior('Timestamp');
        $this->belongsTo('Categories')
            ->setForeignKey('CategoryId')
            ->bindingKey('CategoryId');
        $this->belongsTo('Suppliers')
            ->setForeignKey('SupplierId')
            ->bindingKey('SupplierId');
        $this->belongsToMany('Items', ['through' => 'OrderItems']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('Name', "Name is not allowed to be empty")
            ->minLength('Name', 4, 'Items must have a substantial name (at least 4 letters)')
            ->maxLength('Name', 50)

            ->date('ArrivalDate')

            ->notEmpty('Price')
            ->numeric('Price');

        $validator->add('Gender', 'custom', [
            'rule' => function ($value, $context) {
                return preg_match_all('/(^Men$)|(^Women$)|(^Unisex$)/', $value)>0;
            },
            'message' => 'The title is not valid'
        ]);
            
        return $validator;
    }
}