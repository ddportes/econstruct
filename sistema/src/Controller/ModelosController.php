<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 *
 * @method \App\Model\Entity\Modelo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ModeloTipos']
        ];
        $modelos = $this->paginate($this->Modelos);

        $this->set(compact('modelos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();
            $dados['empresa_id'] = $user['empresa_id'];
            $dados['u_id'] = $user['id'];

            $modelo = $this->Modelos->patchEntity($modelo, $dados);
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('O modelo foi gravado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O modelo não pôde ser gravado. Tente novamente mais tarde.'));
        }
        $modeloTipos = $this->Modelos->ModeloTipos->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'modeloTipos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('O modelo foi editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O modelo não pôde ser editado. Tente novamente mais tarde.'));
        }
        $modeloTipos = $this->Modelos->ModeloTipos->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'modeloTipos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('O modelo foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('O modelo não pôde ser excluído. Tente novamente mais tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function modelos(){
        $this->request->accepts('get');
        $dados = $_GET;

        $hash = $this->request->getParam('_csrfToken');

        if(!isset($dados['hash']) || $dados['hash'] != $hash){
            throw new BadRequestException();
        }
        $modelos = $this->Modelos->modelos();

        $retorno = json_encode($modelos);

        $this->set(compact('retorno'));
    }
}
