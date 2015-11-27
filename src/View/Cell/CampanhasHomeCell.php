<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CampanhasHome cell
 */
class CampanhasHomeCell extends Cell
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
    public function display($type)
    {
        $campanhas = '';
        switch ($type) {
            case 'escolhidos':
                $campanhas = $this->getEscolhidos();
                break;
            case 'populares':
                $campanhas = $this->getPopulares();
                break;
        }
        $this->set(compact('campanhas'));
    }
    protected function getPopulares()
    {
        $campanhas = [
            [
                'title' => 'Botafogo - Popular',
                'text' => 'Eu apoio bla bla bla.',
                'url' => ['controller' => 'Site', 'action' => 'campanha', 'mariana']
            ],
            [
                'title' => 'França',
                'text' => 'Eu apoio França bla bla bla.',
                'url' => ['controller' => 'Site', 'action' => 'campanha', 'mariana']
            ],
        ];
        return $campanhas;
    }
    protected function getEscolhidos()
    {
        $campanhas = [
            [
                'title' => 'Botafogo - O Campeão Voltou',
                'text' => 'Eu apoio bla bla bla.',
                'url' => ['controller' => 'Site', 'action' => 'campanha', 'mariana']
            ],
            [
                'title' => 'Mariana',
                'text' => 'Eu apoio Mariana bla bla bla.',
                'url' => ['controller' => 'Site', 'action' => 'campanha', 'mariana']
            ],
        ];
        return $campanhas;
    }
}
