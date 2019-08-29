<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissoes Controller
 *
 * @property \App\Model\Table\PermissoesTable $Permissoes
 *
 * @method \App\Model\Entity\Permissao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PermissaoPais']
        ];
        $permissoes = $this->paginate($this->Permissoes);

        $this->set(compact('permissoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissao = $this->Permissoes->get($id, [
            'contain' => ['PermissaoPais', 'PermissaoPapeis']
        ]);

        $this->set('permissao', $permissao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissao = $this->Permissoes->newEntity();
        if ($this->request->is('post')) {
            $permissao = $this->Permissoes->patchEntity($permissao, $this->request->getData());
            if ($this->Permissoes->save($permissao)) {
                $this->Flash->success(__('The permissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao could not be saved. Please, try again.'));
        }
        $permissaoPais = $this->Permissoes->PermissaoPais->find('list', ['limit' => 200]);
        $this->set(compact('permissao', 'permissaoPais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissao = $this->Permissoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissao = $this->Permissoes->patchEntity($permissao, $this->request->getData());
            if ($this->Permissoes->save($permissao)) {
                $this->Flash->success(__('The permissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao could not be saved. Please, try again.'));
        }
        $permissaoPais = $this->Permissoes->PermissaoPais->find('list', ['limit' => 200]);
        $this->set(compact('permissao', 'permissaoPais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissao = $this->Permissoes->get($id);
        if ($this->Permissoes->delete($permissao)) {
            $this->Flash->success(__('The permissao has been deleted.'));
        } else {
            $this->Flash->error(__('The permissao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
