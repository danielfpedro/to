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
        $this->loadModel('Campanhas');

        $campanhas = [];
        
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
        $campanhas = $this->Campanhas->find('all', [
            'contain' => ['Users', 'Categorias'],
            'limit' => 3
        ]);
        return $campanhas;
    }
    protected function getEscolhidos()
    {
        $campanhas = $this->Campanhas->find('all', [
            'contain' => ['Users', 'Categorias'],
            'limit' => 3
        ]);
        return $campanhas;
    }
}
