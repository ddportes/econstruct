<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contratos Controller
 *
 * @property \App\Model\Table\ContratosTable $Contratos
 *
 * @method \App\Model\Entity\Contrato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContratosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orcamentos']
        ];
        $contratos = $this->paginate($this->Contratos);

        $this->set(compact('contratos'));
    }

    /**
     * View method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contrato = $this->Contratos->get($id, [
            'contain' => ['Orcamentos', 'Projetos']
        ]);

        $this->set('contrato', $contrato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id = null)
    {
        $contrato = $this->Contratos->newEntity();
        if ($this->request->is('post')) {
            $contrato = $this->Contratos->patchEntity($contrato, $this->request->getData());
            if ($this->Contratos->save($contrato)) {
                $this->Flash->success(__('The contrato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contrato could not be saved. Please, try again.'));
        }
        $orcamentos = $this->Contratos->Orcamentos->find('list', ['limit' => 200]);
        $this->set(compact('contrato', 'orcamentos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contrato = $this->Contratos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contrato = $this->Contratos->patchEntity($contrato, $this->request->getData());
            if ($this->Contratos->save($contrato)) {
                $this->Flash->success(__('The contrato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contrato could not be saved. Please, try again.'));
        }
        $orcamentos = $this->Contratos->Orcamentos->find('list', ['limit' => 200]);
        $this->set(compact('contrato', 'orcamentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contrato = $this->Contratos->get($id);
        if ($this->Contratos->delete($contrato)) {
            $this->Flash->success(__('The contrato has been deleted.'));
        } else {
            $this->Flash->error(__('The contrato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
