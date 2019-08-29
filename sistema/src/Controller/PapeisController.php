<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Papeis Controller
 *
 * @property \App\Model\Table\PapeisTable $Papeis
 *
 * @method \App\Model\Entity\Papel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PapeisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PapelPais']
        ];
        $papeis = $this->paginate($this->Papeis);

        $this->set(compact('papeis'));
    }

    /**
     * View method
     *
     * @param string|null $id Papel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $papel = $this->Papeis->get($id, [
            'contain' => ['PapelPais', 'PermissaoPapeis', 'UserPapeis']
        ]);

        $this->set('papel', $papel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $papel = $this->Papeis->newEntity();
        if ($this->request->is('post')) {
            $papel = $this->Papeis->patchEntity($papel, $this->request->getData());
            if ($this->Papeis->save($papel)) {
                $this->Flash->success(__('The papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The papel could not be saved. Please, try again.'));
        }
        $papelPais = $this->Papeis->PapelPais->find('list', ['limit' => 200]);
        $this->set(compact('papel', 'papelPais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Papel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $papel = $this->Papeis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $papel = $this->Papeis->patchEntity($papel, $this->request->getData());
            if ($this->Papeis->save($papel)) {
                $this->Flash->success(__('The papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The papel could not be saved. Please, try again.'));
        }
        $papelPais = $this->Papeis->PapelPais->find('list', ['limit' => 200]);
        $this->set(compact('papel', 'papelPais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Papel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $papel = $this->Papeis->get($id);
        if ($this->Papeis->delete($papel)) {
            $this->Flash->success(__('The papel has been deleted.'));
        } else {
            $this->Flash->error(__('The papel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
