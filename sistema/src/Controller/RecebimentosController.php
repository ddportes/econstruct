<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recebimentos Controller
 *
 * @property \App\Model\Table\RecebimentosTable $Recebimentos
 *
 * @method \App\Model\Entity\Recebimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecebimentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos']
        ];
        $recebimentos = $this->paginate($this->Recebimentos);

        $this->set(compact('recebimentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => ['Projetos']
        ]);

        $this->set('recebimento', $recebimento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recebimento = $this->Recebimentos->newEntity();
        if ($this->request->is('post')) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->getData());
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
        }
        $projetos = $this->Recebimentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->getData());
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
        }
        $projetos = $this->Recebimentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recebimento = $this->Recebimentos->get($id);
        if ($this->Recebimentos->delete($recebimento)) {
            $this->Flash->success(__('The recebimento has been deleted.'));
        } else {
            $this->Flash->error(__('The recebimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
