<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Sidemenu cell
 */
class SidemenuCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Categorias');
        $items = $this->Categorias->find('all', [
            'conditions' => ['is_active' => true, 'deleted' => false]
        ]);
        $this->set(compact('items'));
    }
}
