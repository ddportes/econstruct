<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orcamentos Controller
 *
 * @property \App\Model\Table\OrcamentosTable $Orcamentos
 *
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcamentosController extends AppController
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
        $orcamentos = $this->paginate($this->Orcamentos);

        $this->set(compact('orcamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcamento = $this->Orcamentos->get($id, [
            'contain' => ['Projetos', 'Contratos']
        ]);

        $this->set('orcamento', $orcamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcamento = $this->Orcamentos->newEntity();
        if ($this->request->is('post')) {
            $orcamento = $this->Orcamentos->patchEntity($orcamento, $this->request->getData());
            if ($this->Orcamentos->save($orcamento)) {
                $this->Flash->success(__('The orcamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcamento could not be saved. Please, try again.'));
        }
        $projetos = $this->Orcamentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('orcamento', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcamento = $this->Orcamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orcamento = $this->Orcamentos->patchEntity($orcamento, $this->request->getData());
            if ($this->Orcamentos->save($orcamento)) {
                $this->Flash->success(__('The orcamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orcamento could not be saved. Please, try again.'));
        }
        $projetos = $this->Orcamentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('orcamento', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcamento = $this->Orcamentos->get($id);
        if ($this->Orcamentos->delete($orcamento)) {
            $this->Flash->success(__('The orcamento has been deleted.'));
        } else {
            $this->Flash->error(__('The orcamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
