<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissaoPapeis Controller
 *
 * @property \App\Model\Table\PermissaoPapeisTable $PermissaoPapeis
 *
 * @method \App\Model\Entity\PermissaoPapel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissaoPapeisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Permissoes', 'Papeis']
        ];
        $permissaoPapeis = $this->paginate($this->PermissaoPapeis);

        $this->set(compact('permissaoPapeis'));
    }

    /**
     * View method
     *
     * @param string|null $id Permissao Papel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissaoPapel = $this->PermissaoPapeis->get($id, [
            'contain' => ['Permissoes', 'Papeis']
        ]);

        $this->set('permissaoPapel', $permissaoPapel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissaoPapel = $this->PermissaoPapeis->newEntity();
        if ($this->request->is('post')) {
            $permissaoPapel = $this->PermissaoPapeis->patchEntity($permissaoPapel, $this->request->getData());
            if ($this->PermissaoPapeis->save($permissaoPapel)) {
                $this->Flash->success(__('The permissao papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao papel could not be saved. Please, try again.'));
        }
        $permissoes = $this->PermissaoPapeis->Permissoes->find('list', ['limit' => 200]);
        $papeis = $this->PermissaoPapeis->Papeis->find('list', ['limit' => 200]);
        $this->set(compact('permissaoPapel', 'permissoes', 'papeis'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permissao Papel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissaoPapel = $this->PermissaoPapeis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissaoPapel = $this->PermissaoPapeis->patchEntity($permissaoPapel, $this->request->getData());
            if ($this->PermissaoPapeis->save($permissaoPapel)) {
                $this->Flash->success(__('The permissao papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao papel could not be saved. Please, try again.'));
        }
        $permissoes = $this->PermissaoPapeis->Permissoes->find('list', ['limit' => 200]);
        $papeis = $this->PermissaoPapeis->Papeis->find('list', ['limit' => 200]);
        $this->set(compact('permissaoPapel', 'permissoes', 'papeis'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permissao Papel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissaoPapel = $this->PermissaoPapeis->get($id);
        if ($this->PermissaoPapeis->delete($permissaoPapel)) {
            $this->Flash->success(__('The permissao papel has been deleted.'));
        } else {
            $this->Flash->error(__('The permissao papel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
