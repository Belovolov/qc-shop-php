<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class SuppliersTable extends Table
{
    public function initialize(array $config)
    {
        // $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('Id')
            ->maxLength('Id', 450)
            ->allowEmpty('Id', 'create');

        $validator
            ->scalar('Name')
            ->maxLength('FirstName', 50)
            ->allowEmpty('FirstName','create');

        $validator
            ->email('Email', false, 'Provide valid email xxx@xxx.xx')
            ->maxLength('Email', 256)
            ->notEmpty('Email');
        $validator
            ->scalar('AddressLine1')
            ->maxLength('AddressLine1', 100)
            ->notEmpty('AddressLine1');

        $validator
            ->scalar('AddressLine2')
            ->maxLength('AddressLine2', 100)
            ->allowEmpty('AddressLine2');

        $validator
            ->scalar('City')
            ->maxLength('City', 50)
            ->notEmpty('City');

        $validator
            ->scalar('ZipCode')
            ->maxLength('ZipCode', 10)
            ->notEmpty('ZipCode');

        $validator
            ->numeric('HomeNumber', "Phone number must contain only digits")
            ->maxLength('HomeNumber', 20)
            ->allowEmpty('HomeNumber',function ($context) {
                return !(empty($context['data']['MobileNumber'])&&empty($context['data']['WorkNumber']));
            }, 'At least one phone number needs to be provided');

        $validator
            ->numeric('MobileNumber',"Phone number must contain only digits")
            ->maxLength('MobileNumber', 20)
            ->allowEmpty('MobileNumber',function ($context) {
                return !(empty($context['data']['HomeNumber'])&&empty($context['data']['WorkNumber']));
            }, 'At least one phone number needs to be provided');

        $validator
            ->numeric('WorkNumber', "Phone number must contain only digits")
            ->maxLength('WorkNumber', 20)
            ->allowEmpty('WorkNumber',function ($context) {
                return !(empty($context['data']['MobileNumber'])&&empty($context['data']['HomeNumber']));
            }, 'At least one phone number needs to be provided');

        $validator
            ->allowEmpty('IsLocked');

        return $validator;
    }
}