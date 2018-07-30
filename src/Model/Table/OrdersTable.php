<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('OrderID');
        $this->setPrimaryKey('OrderID');

        $this->belongsTo('Users')
            ->setForeignKey('CustomerId')
            ->bindingKey('Id');
        $this->hasMany('ShoppingCartItems')
            ->setForeignKey('OrderId');
        
        $this->hasMany('OrderItems')
            ->setForeignKey('OrderID');
        $this->belongsToMany('Items', [
            'through' => 'OrderItems',
        ])->setForeignKey('OrderID')->targetForeignKey('ItemID');
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
            ->integer('OrderID')
            ->allowEmpty('OrderID', 'create');

        $validator
            ->integer('CustomerID')
            ->requirePresence('CustomerID', 'create')
            ->notEmpty('CustomerID');

        $validator
            ->dateTime('Date')
            ->requirePresence('Date', 'create')
            ->notEmpty('Date');

        $validator
            ->numeric('GST')
            ->requirePresence('GST', 'create')
            ->notEmpty('GST');

        $validator
            ->scalar('Status')
            ->maxLength('Status', 10)
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');

        $validator
            ->numeric('Subtotal')
            ->requirePresence('Subtotal', 'create')
            ->notEmpty('Subtotal');

        $validator
            ->numeric('GrandTotal')
            ->requirePresence('GrandTotal', 'create')
            ->notEmpty('GrandTotal');

        return $validator;
    }
}
