<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjetoSituacoes Controller
 *
 * @property \App\Model\Table\ProjetoSituacoesTable $ProjetoSituacoes
 *
 * @method \App\Model\Entity\ProjetoSituacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjetoSituacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $projetoSituacoes = $this->paginate($this->ProjetoSituacoes);

        $this->set(compact('projetoSituacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Projeto Situacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projetoSituacao = $this->ProjetoSituacoes->get($id, [
            'contain' => ['Projetos']
        ]);

        $this->set('projetoSituacao', $projetoSituacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projetoSituacao = $this->ProjetoSituacoes->newEntity();
        if ($this->request->is('post')) {
            $projetoSituacao = $this->ProjetoSituacoes->patchEntity($projetoSituacao, $this->request->getData());
            if ($this->ProjetoSituacoes->save($projetoSituacao)) {
                $this->Flash->success(__('The projeto situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('projetoSituacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto Situacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projetoSituacao = $this->ProjetoSituacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projetoSituacao = $this->ProjetoSituacoes->patchEntity($projetoSituacao, $this->request->getData());
            if ($this->ProjetoSituacoes->save($projetoSituacao)) {
                $this->Flash->success(__('The projeto situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('projetoSituacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto Situacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projetoSituacao = $this->ProjetoSituacoes->get($id);
        if ($this->ProjetoSituacoes->delete($projetoSituacao)) {
            $this->Flash->success(__('The projeto situacao has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto situacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
