<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OcorrenciaTipos Controller
 *
 * @property \App\Model\Table\OcorrenciaTiposTable $OcorrenciaTipos
 *
 * @method \App\Model\Entity\OcorrenciaTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OcorrenciaTiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ocorrenciaTipos = $this->paginate($this->OcorrenciaTipos);

        $this->set(compact('ocorrenciaTipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Ocorrencia Tipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ocorrenciaTipo = $this->OcorrenciaTipos->get($id, [
            'contain' => ['Ocorrencias']
        ]);

        $this->set('ocorrenciaTipo', $ocorrenciaTipo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ocorrenciaTipo = $this->OcorrenciaTipos->newEntity();
        if ($this->request->is('post')) {
            $ocorrenciaTipo = $this->OcorrenciaTipos->patchEntity($ocorrenciaTipo, $this->request->getData());
            if ($this->OcorrenciaTipos->save($ocorrenciaTipo)) {
                $this->Flash->success(__('The ocorrencia tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('ocorrenciaTipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ocorrencia Tipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ocorrenciaTipo = $this->OcorrenciaTipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ocorrenciaTipo = $this->OcorrenciaTipos->patchEntity($ocorrenciaTipo, $this->request->getData());
            if ($this->OcorrenciaTipos->save($ocorrenciaTipo)) {
                $this->Flash->success(__('The ocorrencia tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('ocorrenciaTipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ocorrencia Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ocorrenciaTipo = $this->OcorrenciaTipos->get($id);
        if ($this->OcorrenciaTipos->delete($ocorrenciaTipo)) {
            $this->Flash->success(__('The ocorrencia tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The ocorrencia tipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
