<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipePedreiros Controller
 *
 * @property \App\Model\Table\EquipePedreirosTable $EquipePedreiros
 *
 * @method \App\Model\Entity\EquipePedreiro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquipePedreirosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipes', 'Pedreiros']
        ];
        $equipePedreiros = $this->paginate($this->EquipePedreiros);

        $this->set(compact('equipePedreiros'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipe Pedreiro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipePedreiro = $this->EquipePedreiros->get($id, [
            'contain' => ['Equipes', 'Pedreiros']
        ]);

        $this->set('equipePedreiro', $equipePedreiro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipePedreiro = $this->EquipePedreiros->newEntity();
        if ($this->request->is('post')) {
            $equipePedreiro = $this->EquipePedreiros->patchEntity($equipePedreiro, $this->request->getData());
            if ($this->EquipePedreiros->save($equipePedreiro)) {
                $this->Flash->success(__('The equipe pedreiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipe pedreiro could not be saved. Please, try again.'));
        }
        $equipes = $this->EquipePedreiros->Equipes->find('list', ['limit' => 200]);
        $pedreiros = $this->EquipePedreiros->Pedreiros->find('list', ['limit' => 200]);
        $this->set(compact('equipePedreiro', 'equipes', 'pedreiros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipe Pedreiro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipePedreiro = $this->EquipePedreiros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipePedreiro = $this->EquipePedreiros->patchEntity($equipePedreiro, $this->request->getData());
            if ($this->EquipePedreiros->save($equipePedreiro)) {
                $this->Flash->success(__('The equipe pedreiro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipe pedreiro could not be saved. Please, try again.'));
        }
        $equipes = $this->EquipePedreiros->Equipes->find('list', ['limit' => 200]);
        $pedreiros = $this->EquipePedreiros->Pedreiros->find('list', ['limit' => 200]);
        $this->set(compact('equipePedreiro', 'equipes', 'pedreiros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipe Pedreiro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipePedreiro = $this->EquipePedreiros->get($id);
        if ($this->EquipePedreiros->delete($equipePedreiro)) {
            $this->Flash->success(__('The equipe pedreiro has been deleted.'));
        } else {
            $this->Flash->error(__('The equipe pedreiro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
