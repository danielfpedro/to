<?php 

namespace App\Controller;

use Cake\Event\Event;
use Cake\Exceptions\NotFoundException;

class SiteController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }   
    public function home()
    {

    }
    public function categoria($slug = null)
    {
        if (!$slug) {
            throw new NotFoundException();
        }
        $this->loadModel('Campanhas');

        $categoria = $this->Campanhas->Categorias->find('all', [
            'conditions' => [
                'slug' => $slug
            ]
        ])
        ->first();

        if (!$categoria) {
            throw new NotFoundException();
        }

        $campanhas = $this->Campanhas->find('all', [
            'conditions' => [
                'categoria_id' => $categoria->id
            ],
            'contain' => ['Users']
        ]);

        $this->set(compact('campanhas'));   
    }
    public function campanha($slug = null)
    {
        if (!$slug) {
            throw new NotFoundException();
        }
        $this->loadModel('Campanhas');
    	$campanha = $this->Campanhas->find('all', [
            'conditions' => [
                'slug' => $slug
            ],
            'contain' => ['Users']
        ])->first();
        if (!$campanha) {
            throw new NotFoundException();
        }
    	$this->set(compact('campanha'));
    }
    public function search()
    {
        
    }
}
