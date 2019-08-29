<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClienteSituacoes Controller
 *
 * @property \App\Model\Table\ClienteSituacoesTable $ClienteSituacoes
 *
 * @method \App\Model\Entity\ClienteSituacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClienteSituacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $clienteSituacoes = $this->paginate($this->ClienteSituacoes);

        $this->set(compact('clienteSituacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente Situacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clienteSituacao = $this->ClienteSituacoes->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('clienteSituacao', $clienteSituacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clienteSituacao = $this->ClienteSituacoes->newEntity();
        if ($this->request->is('post')) {
            $clienteSituacao = $this->ClienteSituacoes->patchEntity($clienteSituacao, $this->request->getData());
            if ($this->ClienteSituacoes->save($clienteSituacao)) {
                $this->Flash->success(__('The cliente situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('clienteSituacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente Situacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clienteSituacao = $this->ClienteSituacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clienteSituacao = $this->ClienteSituacoes->patchEntity($clienteSituacao, $this->request->getData());
            if ($this->ClienteSituacoes->save($clienteSituacao)) {
                $this->Flash->success(__('The cliente situacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente situacao could not be saved. Please, try again.'));
        }
        $this->set(compact('clienteSituacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente Situacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clienteSituacao = $this->ClienteSituacoes->get($id);
        if ($this->ClienteSituacoes->delete($clienteSituacao)) {
            $this->Flash->success(__('The cliente situacao has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente situacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
