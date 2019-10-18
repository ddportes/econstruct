<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModeloTipos Controller
 *
 * @property \App\Model\Table\ModeloTiposTable $ModeloTipos
 *
 * @method \App\Model\Entity\ModeloTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModeloTiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $modeloTipos = $this->paginate($this->ModeloTipos);

        $this->set(compact('modeloTipos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modeloTipo = $this->ModeloTipos->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();
            $dados['empresa_id'] = $user['empresa_id'];
            $dados['u_id'] = $user['id'];

            $modeloTipo = $this->ModeloTipos->patchEntity($modeloTipo, $dados);
            if ($this->ModeloTipos->save($modeloTipo)) {
                $this->Flash->success(__('O tipo de modelo foi criado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível criar o tipo de modelo. Tente novamente mais tarde.'));
        }
        $this->set(compact('modeloTipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modeloTipo = $this->ModeloTipos->get($id);
        if ($this->ModeloTipos->delete($modeloTipo)) {
            $this->Flash->success(__('O tipo de modelo foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('O tipo de modelo não pôde ser excluído. Tente novamente mais tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
