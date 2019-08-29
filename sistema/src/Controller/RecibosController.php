<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recibos Controller
 *
 * @property \App\Model\Table\RecibosTable $Recibos
 *
 * @method \App\Model\Entity\Recibo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecibosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipes', 'Projetos']
        ];
        $recibos = $this->paginate($this->Recibos);

        $this->set(compact('recibos'));
    }

    /**
     * View method
     *
     * @param string|null $id Recibo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recibo = $this->Recibos->get($id, [
            'contain' => ['Equipes', 'Projetos']
        ]);

        $this->set('recibo', $recibo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recibo = $this->Recibos->newEntity();
        if ($this->request->is('post')) {
            $recibo = $this->Recibos->patchEntity($recibo, $this->request->getData());
            if ($this->Recibos->save($recibo)) {
                $this->Flash->success(__('The recibo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recibo could not be saved. Please, try again.'));
        }
        $equipes = $this->Recibos->Equipes->find('list', ['limit' => 200]);
        $projetos = $this->Recibos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('recibo', 'equipes', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recibo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recibo = $this->Recibos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recibo = $this->Recibos->patchEntity($recibo, $this->request->getData());
            if ($this->Recibos->save($recibo)) {
                $this->Flash->success(__('The recibo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recibo could not be saved. Please, try again.'));
        }
        $equipes = $this->Recibos->Equipes->find('list', ['limit' => 200]);
        $projetos = $this->Recibos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('recibo', 'equipes', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recibo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recibo = $this->Recibos->get($id);
        if ($this->Recibos->delete($recibo)) {
            $this->Flash->success(__('The recibo has been deleted.'));
        } else {
            $this->Flash->error(__('The recibo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
