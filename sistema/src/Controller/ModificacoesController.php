<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modificacoes Controller
 *
 * @property \App\Model\Table\ModificacoesTable $Modificacoes
 *
 * @method \App\Model\Entity\Modificacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModificacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Useres', 'Empresas']
        ];
        $modificacoes = $this->paginate($this->Modificacoes);

        $this->set(compact('modificacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Modificacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modificacao = $this->Modificacoes->get($id, [
            'contain' => ['Useres', 'Empresas']
        ]);

        $this->set('modificacao', $modificacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modificacao = $this->Modificacoes->newEntity();
        if ($this->request->is('post')) {
            $modificacao = $this->Modificacoes->patchEntity($modificacao, $this->request->getData());
            if ($this->Modificacoes->save($modificacao)) {
                $this->Flash->success(__('The modificacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modificacao could not be saved. Please, try again.'));
        }
        $useres = $this->Modificacoes->Useres->find('list', ['limit' => 200]);
        $empresas = $this->Modificacoes->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('modificacao', 'useres', 'empresas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modificacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modificacao = $this->Modificacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modificacao = $this->Modificacoes->patchEntity($modificacao, $this->request->getData());
            if ($this->Modificacoes->save($modificacao)) {
                $this->Flash->success(__('The modificacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modificacao could not be saved. Please, try again.'));
        }
        $useres = $this->Modificacoes->Useres->find('list', ['limit' => 200]);
        $empresas = $this->Modificacoes->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('modificacao', 'useres', 'empresas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modificacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modificacao = $this->Modificacoes->get($id);
        if ($this->Modificacoes->delete($modificacao)) {
            $this->Flash->success(__('The modificacao has been deleted.'));
        } else {
            $this->Flash->error(__('The modificacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
