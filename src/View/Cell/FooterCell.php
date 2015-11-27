<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Footer cell
 */
class FooterCell extends Cell
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
        $socials = [
            [
                'label' => 'Facebook',
                'icon' => 'facebook',
                'url' => []
            ],
            [
                'label' => 'Twitter',
                'icon' => 'twitter',
                'url' => []
            ]
        ];
        $this->set(compact('socials'));
    }
}
