<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PedreiroSituacoes Controller
 *
 * @property \App\Model\Table\PedreiroSituacoesTable $PedreiroSituacoes
 *
 * @method \App\Model\Entity\PedreiroSituacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedreiroSituacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pedreiroSituacoes = $this->paginate($this->PedreiroSituacoes);

        $this->set(compact('pedreiroSituacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedreiro Situacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedreiroSituacao = $this->PedreiroSituacoes->get($id, [
            'contain' => ['Pedreiros']
        ]);

        $this->set('pedreiroSituacao', $pedreiroSituacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedreiroSituacao = $this->PedreiroSituacoes->newEntity();
        if ($this->request->is('post')) {
            $pedreiroSituacao = $this->PedreiroSituacoes->patchEntity($pedreiroSituacao, $this->request->getData());
            if ($this->PedreiroSituacoes->save($pedreiroSituacao)) {
                $this->Flash->success(__('The pedreiro situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedreiro situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('pedreiroSituacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedreiro Situacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedreiroSituacao = $this->PedreiroSituacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedreiroSituacao = $this->PedreiroSituacoes->patchEntity($pedreiroSituacao, $this->request->getData());
            if ($this->PedreiroSituacoes->save($pedreiroSituacao)) {
                $this->Flash->success(__('The pedreiro situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedreiro situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('pedreiroSituacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedreiro Situacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedreiroSituacao = $this->PedreiroSituacoes->get($id);
        if ($this->PedreiroSituacoes->delete($pedreiroSituacao)) {
            $this->Flash->success(__('The pedreiro situacao has been deleted.'));
        } else {
            $this->Flash->error(__('The pedreiro situacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
