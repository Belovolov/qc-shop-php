<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Item extends Entity
{
    public function initialize()
    {
        parent::initialize();
    }
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}