<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $OrderID
 * @property int $CustomerID
 * @property \Cake\I18n\FrozenTime $Date
 * @property float $GST
 * @property string $Status
 * @property float $Subtotal
 * @property float $GrandTotal
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'CustomerID' => true,
        'Date' => true,
        'GST' => true,
        'Status' => true,
        'Subtotal' => true,
        'GrandTotal' => true
    ];
}
