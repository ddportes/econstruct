<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FornecedorSituacoes Controller
 *
 * @property \App\Model\Table\FornecedorSituacoesTable $FornecedorSituacoes
 *
 * @method \App\Model\Entity\FornecedorSituacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornecedorSituacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fornecedorSituacoes = $this->paginate($this->FornecedorSituacoes);

        $this->set(compact('fornecedorSituacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor Situacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedorSituacao = $this->FornecedorSituacoes->get($id, [
            'contain' => ['Fornecedores']
        ]);

        $this->set('fornecedorSituacao', $fornecedorSituacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornecedorSituacao = $this->FornecedorSituacoes->newEntity();
        if ($this->request->is('post')) {
            $fornecedorSituacao = $this->FornecedorSituacoes->patchEntity($fornecedorSituacao, $this->request->getData());
            if ($this->FornecedorSituacoes->save($fornecedorSituacao)) {
                $this->Flash->success(__('The fornecedor situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('fornecedorSituacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fornecedor Situacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedorSituacao = $this->FornecedorSituacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedorSituacao = $this->FornecedorSituacoes->patchEntity($fornecedorSituacao, $this->request->getData());
            if ($this->FornecedorSituacoes->save($fornecedorSituacao)) {
                $this->Flash->success(__('The fornecedor situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('fornecedorSituacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedor Situacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedorSituacao = $this->FornecedorSituacoes->get($id);
        if ($this->FornecedorSituacoes->delete($fornecedorSituacao)) {
            $this->Flash->success(__('The fornecedor situacao has been deleted.'));
        } else {
            $this->Flash->error(__('The fornecedor situacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
