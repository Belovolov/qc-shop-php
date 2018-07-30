<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LatestArrivals cell
 */
class LatestArrivalsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadModel('Items');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

        $items = $this 
            -> Items 
            -> find()
            -> order(['ArrivalDate' => 'DESC'])
            -> limit(10);

        $this-> set('items', $items);
    }
}
