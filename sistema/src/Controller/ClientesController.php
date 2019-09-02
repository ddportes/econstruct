<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas','Pessoas.Contatos','Pessoas.Enderecos','ClienteSituacoes','Projetos','Projetos.ProjetoSituacoes']
        ];
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Pessoas', 'ClienteSituacoes', 'Projetos','Pessoas.Contatos','Pessoas.Enderecos']
        ]);

        $this->set('cliente', $cliente);
    }

    public function retornaCliente($id=null)
    {
        if(!$id){
            $retorno = '';
        }else {

            $cliente = $this->Clientes->get($id, [
                'contain' => ['Pessoas', 'ClienteSituacoes', 'Projetos', 'Pessoas.Contatos', 'Pessoas.Enderecos']
            ]);
            $retorno = json_encode($cliente);
        }

        $this->set(compact('retorno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $pessoas = $this->Clientes->Pessoas->find('list', ['limit' => 200]);
        $clienteSituacoes = $this->Clientes->ClienteSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'pessoas', 'clienteSituacoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $pessoas = $this->Clientes->Pessoas->find('list', ['limit' => 200]);
        $clienteSituacoes = $this->Clientes->ClienteSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'pessoas', 'clienteSituacoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
