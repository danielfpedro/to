<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Campanhas Controller
 *
 * @property \App\Model\Table\CampanhasTable $Campanhas
 */
class CampanhasController extends AppController
{
    public function img()
    {
        
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categorias']
        ];
        $this->set('campanhas', $this->paginate($this->Campanhas));
        $this->set('_serialize', ['campanhas', 'categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Campanha id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campanha = $this->Campanhas->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('campanha', $campanha);
        $this->set('_serialize', ['campanha']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->template('form');

        $campanha = $this->Campanhas->newEntity();
        if ($this->request->is('post')) {
            $campanha = $this->Campanhas->patchEntity($campanha, $this->request->data);
            $campanha->user_id = $this->Auth->user('id');
            if ($this->Campanhas->save($campanha)) {
                $this->Flash->success(__('The campanha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campanha could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Campanhas->Categorias->find('list');
        $this->set(compact('campanha', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Campanha id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->template('form');

        $campanha = $this->Campanhas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campanha = $this->Campanhas->patchEntity($campanha, $this->request->data);
            if ($this->Campanhas->save($campanha)) {
                $this->Flash->success(__('The campanha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The campanha could not be saved. Please, try again.'));
            }
        }
        $users = $this->Campanhas->Users->find('list', ['limit' => 200]);
        $this->set(compact('campanha', 'users'));
        $this->set('_serialize', ['campanha']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campanha id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campanha = $this->Campanhas->get($id);
        if ($this->Campanhas->delete($campanha)) {
            $this->Flash->success(__('The campanha has been deleted.'));
        } else {
            $this->Flash->error(__('The campanha could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
