<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedreiros Controller
 *
 * @property \App\Model\Table\PedreirosTable $Pedreiros
 *
 * @method \App\Model\Entity\Pedreiro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedreirosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'PedreiroSituacoes']
        ];
        $pedreiros = $this->paginate($this->Pedreiros);

        $this->set(compact('pedreiros'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedreiro = $this->Pedreiros->get($id, [
            'contain' => ['Pessoas', 'PedreiroSituacoes', 'EquipePedreiros']
        ]);

        $this->set('pedreiro', $pedreiro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedreiro = $this->Pedreiros->newEntity();
        if ($this->request->is('post')) {
            $pedreiro = $this->Pedreiros->patchEntity($pedreiro, $this->request->getData());
            if ($this->Pedreiros->save($pedreiro)) {
                $this->Flash->success(__('The pedreiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedreiro could not be saved. Please, try again.'));
        }
        $pessoas = $this->Pedreiros->Pessoas->find('list', ['limit' => 200]);
        $pedreiroSituacoes = $this->Pedreiros->PedreiroSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('pedreiro', 'pessoas', 'pedreiroSituacoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedreiro = $this->Pedreiros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedreiro = $this->Pedreiros->patchEntity($pedreiro, $this->request->getData());
            if ($this->Pedreiros->save($pedreiro)) {
                $this->Flash->success(__('The pedreiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedreiro could not be saved. Please, try again.'));
        }
        $pessoas = $this->Pedreiros->Pessoas->find('list', ['limit' => 200]);
        $pedreiroSituacoes = $this->Pedreiros->PedreiroSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('pedreiro', 'pessoas', 'pedreiroSituacoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedreiro = $this->Pedreiros->get($id);
        if ($this->Pedreiros->delete($pedreiro)) {
            $this->Flash->success(__('The pedreiro has been deleted.'));
        } else {
            $this->Flash->error(__('The pedreiro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
