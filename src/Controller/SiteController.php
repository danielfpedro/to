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

        $this->paginate = [
            'conditions' => [
                'Campanhas.categoria_id' => $categoria->id
            ],
            'contain' => ['Users', 'Categorias']
        ];

        $campanhas = $this->paginate($this->Campanhas);

        $this->set(compact('campanhas'));   
    }
    public function busca()
    {
        $q = $this->request->query('q');
        if (!$q) {
            throw new NotFoundException();
        }
        $this->loadModel('Campanhas');

        $qQuery = str_replace(' ', '%', $q);

        $this->paginate = [
            'conditions' => [
                'tags LIKE' => '%' . $qQuery . '%'
            ],
            'contain' => ['Users', 'Categorias'],
        ];

        $campanhas = $this->paginate($this->Campanhas);

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
