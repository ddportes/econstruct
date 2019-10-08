<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 *
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Us', 'Representantes']
        ];
        $empresas = $this->paginate($this->Empresas);

        $this->set(compact('empresas'));
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Us', 'Representantes', 'Enderecos', 'ClienteSituacoes', 'Clientes', 'Configuracoes', 'Contatos', 'Contratos', 'Dependentes', 'EquipePedreiros', 'Equipes', 'FornecedorSituacoes', 'Fornecedores', 'Itens', 'Modificacoes', 'Notas', 'OcorrenciaTipos', 'Ocorrencias', 'Orcamentos', 'Papeis', 'PedreiroSituacoes', 'Pedreiros', 'PermissaoPapeis', 'Permissoes', 'Pessoas', 'ProdutoTipos', 'Produtos', 'ProjetoSituacoes', 'Projetos', 'Recebimentos', 'Recibos', 'Rendas', 'UserPapeis', 'Users']
        ]);

        $this->set('empresa', $empresa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }
        $user = $this->Empresas->Users->find('list', ['limit' => 200]);
        $representantes = $this->Empresas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('empresa', 'user', 'representantes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->Empresas->get($id);

        $endereco = null;
        if (!empty($empresa->endereco_id)){
            $endereco = $this->Empresas->Enderecos->get($empresa->endereco_id);
        }

        $representante = null;
        if (!empty($empresa->representante_id)){
            $representante = $this->Empresas->Pessoas->get($empresa->representante_id);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }

        $this->set(compact('empresa','endereco','representante'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        if ($this->Empresas->delete($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
