<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Supplier extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    protected function _getAddress()
    {
        return $this->_properties['AddressLine1'] . '  ' .
            $this->_properties['AddressLine2'] . ' ' . 
            $this->_properties['City'] . ' ' . 
            $this->_properties['ZipCode'];
    }
}