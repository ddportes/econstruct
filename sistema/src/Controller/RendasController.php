<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rendas Controller
 *
 * @property \App\Model\Table\RendasTable $Rendas
 *
 * @method \App\Model\Entity\Renda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $rendas = $this->paginate($this->Rendas);

        $this->set(compact('rendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $renda = $this->Rendas->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('renda', $renda);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($pessoa_id = null)
    {
        $renda = $this->Rendas->newEntity();
        if($pessoa_id) {
            if ($this->request->is('post')) {
                $renda = $this->Rendas->patchEntity($renda, $this->request->getData());
                if ($this->Rendas->save($renda)) {
                    $this->Flash->success(__('The renda has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The renda could not be saved. Please, try again.'));
            }
            $rendas = $this->Rendas->find('list', ['limit' => 200])->where(['pessoa_id' => $pessoa_id]);
        }else{
            $this->Flash->error(__('Selecione um cliente.'));
            $rendas = null;
        }

        $this->set(compact('renda', 'rendas','pessoa_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $renda = $this->Rendas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $renda = $this->Rendas->patchEntity($renda, $this->request->getData());
            if ($this->Rendas->save($renda)) {
                $this->Flash->success(__('The renda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The renda could not be saved. Please, try again.'));
        }
        $pessoas = $this->Rendas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('renda', 'pessoas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $renda = $this->Rendas->get($id);
        if ($this->Rendas->delete($renda)) {
            $this->Flash->success(__('The renda has been deleted.'));
        } else {
            $this->Flash->error(__('The renda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
