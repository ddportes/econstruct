<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fornecedores Controller
 *
 * @property \App\Model\Table\FornecedoresTable $Fornecedores
 *
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornecedoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FornecedorSituacoes', 'Pessoas']
        ];
        $fornecedores = $this->paginate($this->Fornecedores);

        $this->set(compact('fornecedores'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => ['FornecedorSituacoes', 'Pessoas', 'Itens']
        ]);

        $this->set('fornecedor', $fornecedor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornecedor = $this->Fornecedores->newEntity();
        if ($this->request->is('post')) {
            $fornecedor = $this->Fornecedores->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('The fornecedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor could not be saved. Please, try again.'));
        }
        $fornecedorSituacoes = $this->Fornecedores->FornecedorSituacoes->find('list', ['limit' => 200]);
        $pessoas = $this->Fornecedores->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('fornecedor', 'fornecedorSituacoes', 'pessoas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedor = $this->Fornecedores->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('The fornecedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor could not be saved. Please, try again.'));
        }
        $fornecedorSituacoes = $this->Fornecedores->FornecedorSituacoes->find('list', ['limit' => 200]);
        $pessoas = $this->Fornecedores->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('fornecedor', 'fornecedorSituacoes', 'pessoas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedor = $this->Fornecedores->get($id);
        if ($this->Fornecedores->delete($fornecedor)) {
            $this->Flash->success(__('The fornecedor has been deleted.'));
        } else {
            $this->Flash->error(__('The fornecedor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
