<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');

        $this->hasMany('Orders')
            ->setForeignKey('CustomerID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('Id')
            ->maxLength('Id', 450)
            ->allowEmpty('Id', 'create');

        $validator
            ->scalar('UserName')
            ->maxLength('UserName', 256)
            ->allowEmpty('UserName')
            ->add('UserName', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('FirstName')
            ->maxLength('FirstName', 50)
            ->allowEmpty('FirstName','create');

        $validator
            ->scalar('LastName')
            ->maxLength('LastName', 50)
            ->allowEmpty('LastName','create');

        $validator
            ->email('Email', false, 'Provide valid email xxx@xxx.xx')
            ->maxLength('Email', 256)
            ->notEmpty('Email');

        $validator
            ->requirePresence('EmailConfirmed', 'create')
            ->notEmpty('EmailConfirmed');

        $validator
            ->scalar('PasswordHash')
            ->maxLength('PasswordHash', 4294967295)
            ->notEmpty('PasswordHash');

        $validator->add('PasswordHash', 'custom', [
            'rule' => function ($value, $context) {
                if (isset($context['data']['PasswordConfirm'])) {
                    return $context['data']['PasswordConfirm'] === $value;
                }
                return false;
            },
            'message' => 'Passwords do not match'
        ]);
        
        $validator
            ->scalar('Role')
            ->maxLength('Role', 20)
            ->requirePresence('Role', 'create')
            ->notEmpty('Role');

        $validator
            ->scalar('AddressLine1')
            ->maxLength('AddressLine1', 100)
            ->allowEmpty('AddressLine1','create');

        $validator
            ->scalar('AddressLine2')
            ->maxLength('AddressLine2', 100)
            ->allowEmpty('AddressLine2');

        $validator
            ->scalar('City')
            ->maxLength('City', 50)
            ->allowEmpty('City','create');

        $validator
            ->scalar('ZipCode')
            ->maxLength('ZipCode', 10)
            ->allowEmpty('ZipCode','create');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['UserName']));

        return $rules;
    }
}
