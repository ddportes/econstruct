<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dependentes Controller
 *
 * @property \App\Model\Table\DependentesTable $Dependentes
 *
 * @method \App\Model\Entity\Dependente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DependentesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'PaiMaes', 'Empresas', 'Us']
        ];
        $dependentes = $this->paginate($this->Dependentes);

        $this->set(compact('dependentes'));
    }

    /**
     * View method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependente = $this->Dependentes->get($id, [
            'contain' => ['Pessoas', 'PaiMaes', 'Empresas', 'Us']
        ]);

        $this->set('dependente', $dependente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($pai_mae_id)
    {
        $dependente = $this->Dependentes->newEntity();
        if ($this->request->is('post')) {
            $dependente = $this->Dependentes->patchEntity($dependente, $this->request->getData());
            if ($this->Dependentes->save($dependente)) {
                $this->Flash->success(__('The dependente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependente could not be saved. Please, try again.'));
        }
        $pessoas = $this->Dependentes->Pessoas->find('list', ['limit' => 200]);
        $paiMae = $this->Dependentes->Pessoas->get($pai_mae_id);
        $empresas = $this->Dependentes->Empresas->find('list', ['limit' => 200]);

        $this->set(compact('dependente', 'pessoas', 'paiMae', 'empresas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependente = $this->Dependentes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependente = $this->Dependentes->patchEntity($dependente, $this->request->getData());
            if ($this->Dependentes->save($dependente)) {
                $this->Flash->success(__('The dependente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependente could not be saved. Please, try again.'));
        }
        $pessoas = $this->Dependentes->Pessoas->find('list', ['limit' => 200]);
        $paiMaes = $this->Dependentes->PaiMaes->find('list', ['limit' => 200]);
        $empresas = $this->Dependentes->Empresas->find('list', ['limit' => 200]);
        $us = $this->Dependentes->Us->find('list', ['limit' => 200]);
        $this->set(compact('dependente', 'pessoas', 'paiMaes', 'empresas', 'us'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependente = $this->Dependentes->get($id);
        if ($this->Dependentes->delete($dependente)) {
            $this->Flash->success(__('The dependente has been deleted.'));
        } else {
            $this->Flash->error(__('The dependente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
