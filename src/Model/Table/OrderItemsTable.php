<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderItems Model
 *
 * @method \App\Model\Entity\OrderItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderItem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderItem findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderItemsTable extends Table
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

        $this->setTable('OrderItems');
        $this->setDisplayField('OrderID');
        $this->setPrimaryKey(['OrderID', 'ItemID']);
        
        $this->belongsTo('Orders')
            ->setForeignKey('OrderID')
            ->bindingKey('OrderID');
        $this->belongsTo('Items')
            ->setForeignKey('ItemID')
            ->bindingKey('ItemID');
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
            ->integer('ItemID')
            ->allowEmpty('ItemID', 'create');

        $validator
            ->integer('Quantity')
            ->requirePresence('Quantity', 'create')
            ->notEmpty('Quantity');

        return $validator;
    }
}
