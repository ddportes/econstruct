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
            'contain' => ['Users', 'Pessoas']
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
            $user = $this->Auth->user();
            $dados = $this->request->getData();

            if(!is_null($empresa->representante_id)){
                $pessoa = $this->Empresas->Pessoas->get($empresa->representante_id);
            }else{
                $pessoa = $this->Empresas->Pessoas->newEntity();
            }

            $dados_pessoa['nome'] = (!empty($dados['nomeRep'])?$dados['nomeRep']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialRep'])?$dados['nomeSocialRep']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilRep'])?$dados['estadoCivilRep']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = (!empty($dados['filhosRep'])?$dados['filhosRep']: 0);
            $dados_pessoa['sexo'] = (!empty($dados['sexoRep'])?$dados['sexoRep']: null);
            $dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados['dataNascimentoRep']);
            $dados_pessoa['data_nascimento'] = ($dados['dataNascimentoRep']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] = (!empty($dados['cpfRep'])?preg_replace('/[^0-9]/', '', $dados['cpfRep']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgRep'])?$dados['rgRep']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];

            $pessoa = $this->Empresas->Pessoas->patchEntity($pessoa,$dados_pessoa);
            if ($this->Empresas->Pessoas->save($pessoa)) {
                $dados['representante_id'] = $pessoa->id;
                $dados['u_id'] = $user['id'];

                $empresa = $this->Empresas->patchEntity($empresa, $dados);
                if ($this->Empresas->save($empresa)) {
                    if (!is_null($empresa->endereco_id)) {
                        $endereco = $this->Empresas->Enderecos->get($empresa->endereco_id);
                    } else {
                        $endereco = $this->Empresas->Enderecos->newEntity();
                    }

                    $dados_endereco['pessoa_id'] = null;
                    $dados_endereco['logradouro'] = (!empty($dados['logradouroEmpresa']) ? $dados['logradouroEmpresa'] : null);
                    $dados_endereco['numero'] = (!empty($dados['numeroEmpresa']) ? preg_replace("/[^0-9,]/", "", $dados['numeroEmpresa']) : null);
                    $dados_endereco['complemento'] = (!empty($dados['complementoEmpresa']) ? $dados['complementoEmpresa'] : null);
                    $dados_endereco['bairro'] = (!empty($dados['bairroEmpresa']) ? $dados['bairroEmpresa'] : null);
                    $dados_endereco['cep'] = (!empty($dados['cepEmpresa']) ? preg_replace('/[^0-9]/', '', $dados['cepEmpresa']) : null);
                    $dados_endereco['cidade'] = (!empty($dados['cidadeEmpresa']) ? $dados['cidadeEmpresa'] : null);
                    $dados_endereco['estado'] = (!empty($dados['estadoEmpresa']) ? $dados['estadoEmpresa'] : null);
                    $dados_endereco['principal'] = 'S';
                    $dados_endereco['empresa_id'] = $user['empresa_id'];
                    $dados_endereco['u_id'] = $user['id'];

                    $endereco = $this->Empresas->Enderecos->patchEntity($endereco, $dados_endereco);
                    if ($this->Empresas->Enderecos->save($endereco)) {
                        $this->loadModel('Modificacoes');
                        $dados_originais = json_encode([$user['id'], $user['username'], 'Edita Empresa']);
                        $dados_novos = json_encode([$user['id'], $user['username'], $empresa, $endereco, $pessoa]);
                        if ($this->Modificacoes->emiteLog('Empresas', 'edit', $dados_originais, $dados_novos)) {
                            $this->Flash->success(__('Empresa editada com sucesso.'));

                        } else {
                            $this->Flash->error(__('Erro ao gravar log.'));
                        }
                    } else {
                        $this->Flash->error(__('Erro ao gravar o endereço.'));
                    }
                } else {
                    $this->Flash->error(__('Erro ao gravar a empresa.'));
                }
            }else{
                $this->Flash->error(__('Erro ao gravar o representante.'));
            }
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
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
