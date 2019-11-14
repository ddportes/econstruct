<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedreiros Controller
 *
 * @property \App\Model\Table\PedreirosTable $Pedreiros
 *
 * @method \App\Model\Entity\Pedreiro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedreirosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas','Pessoas.Contatos','Pessoas.Enderecos', 'PedreiroSituacoes', 'EquipePedreiros', 'EquipePedreiros.Equipes', 'EquipePedreiros.Equipes.Projetos', 'EquipePedreiros.Equipes.Projetos.Recibos', 'EquipePedreiros.Equipes.Projetos.Recibos.Equipes', 'EquipePedreiros.Equipes.Projetos.Recibos.Projetos', 'EquipePedreiros.Equipes.Recibos']
        ];
        $pedreiros = $this->paginate($this->Pedreiros);


        $this->set(compact('pedreiros'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedreiro = $this->Pedreiros->get($id, [
            'contain' => ['Pessoas','Pessoas.Contatos','Pessoas.Enderecos', 'PedreiroSituacoes', 'EquipePedreiros']
        ]);

        $this->set('pedreiro', $pedreiro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $pedreiro = $this->Pedreiros->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();

            $dados_pessoa = $dados['pessoa'];
            $dados_pessoa['nome'] = (!empty($dados_pessoa['nome'])?$dados_pessoa['nome']: null);
            $dados_pessoa['nome_social'] = (!empty($dados_pessoa['nome_social'])?$dados_pessoa['nome_social']: null);
            $dados_pessoa['profissao'] = (!empty($dados_pessoa['profissao'])?$dados_pessoa['profissao']: null);
            $dados_pessoa['nacionalidade'] = (!empty($dados_pessoa['nacionalidade'])?$dados_pessoa['nacionalidade']: null);
            $dados_pessoa['naturalidade'] = (!empty($dados_pessoa['naturalidade'])?$dados_pessoa['naturalidade']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados_pessoa['estado_civil'])?$dados_pessoa['estado_civil']: null);
            $dados_pessoa['conjuge_id'] = (!empty($dados_pessoa['conjugeHiddenPessoa'])?$dados_pessoa['conjugeHiddenPessoa']: null);
            $dados_pessoa['filhos'] = (!empty($dados_pessoa['filhos'])?$dados_pessoa['filhos']: 0);
            $dados_pessoa['sexo'] = (!empty($dados_pessoa['sexo'])?$dados_pessoa['sexo']: null);
            $dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados_pessoa['data_nascimento']);
            $dados_pessoa['data_nascimento'] = ($dados_pessoa['data_nascimento']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] = (!empty($dados_pessoa['cpf_cnpj'])?preg_replace('/[^0-9]/', '', $dados_pessoa['cpf_cnpj']): null);
            $dados_pessoa['rg'] = (!empty($dados_pessoa['rg'])?$dados_pessoa['rg']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];
            $pessoa = $this->Pedreiros->Pessoas->newEntity($dados_pessoa);
            $this->Pedreiros->Pessoas->save($pessoa);

            $dados_endereco = $dados['endereco'];

            $dados_endereco['pessoa_id'] = $pessoa->id;
            $dados_endereco['logradouro'] = (!empty($dados_endereco['logradouro'])?$dados_endereco['logradouro']: null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?preg_replace("/[^0-9,]/", "",$dados_endereco['numero']): null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?$dados_endereco['numero']: null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?$dados_endereco['numero']: null);
            $dados_endereco['cep'] = (!empty($dados_endereco['cep'])?preg_replace('/[^0-9]/', '', $dados_endereco['cep']): null);
            $dados_endereco['cidade'] = (!empty($dados_endereco['cidade'])?$dados_endereco['cidade']: null);
            $dados_endereco['estado'] = (!empty($dados_endereco['estado'])?$dados_endereco['estado']: null);
            $dados_endereco['principal'] = 'S';
            $dados_endereco['empresa_id'] = $user['empresa_id'];
            $dados_endereco['u_id'] = $user['id'];
            $endereco = $this->Pedreiros->Pessoas->Enderecos->newEntity($dados_endereco);
            $this->Pedreiros->Pessoas->Enderecos->save($endereco);

            $dados_contato[0]['pessoa_id'] = $pessoa->id;
            $dados_contato[0]['tipo'] = 'telefone';
            $dados_contato[0]['valor'] = (!empty($dados_pessoa['telefone'])?$dados_pessoa['telefone']: null);
            $dados_contato[0]['principal'] = 'S';
            $dados_contato[0]['empresa_id'] = $user['empresa_id'] ;
            $dados_contato[0]['u_id'] = $user['id'];

            $dados_contato[1]['pessoa_id'] = $pessoa->id;
            $dados_contato[1]['tipo'] = 'email';
            $dados_contato[1]['valor'] = (!empty($dados_pessoa['email'])?$dados_pessoa['email']: null);
            $dados_contato[1]['principal'] = 'N';
            $dados_contato[1]['empresa_id'] = $user['empresa_id'];
            $dados_contato[1]['u_id'] = $user['id'];
            $contatos = $this->Pedreiros->Pessoas->Contatos->newEntities($dados_contato);//saveMany
            $this->Pedreiros->Pessoas->Contatos->saveMany($contatos);

            $dados_pedreiro['pessoa_id'] = $pessoa->id;
            $dados_pedreiro['observacao'] = $dados['observacao'];
            $dados_pedreiro['empresa_id'] = $user['empresa_id'];
            $dados_pedreiro['pedreiro_situacao_id'] = $dados['pedreiro_situacao_id'];
            $dados_pedreiro['u_id'] = $user['id'];
            $pedreiro = $this->Pedreiros->patchEntity($pedreiro, $dados_pedreiro);

            if ($this->Pedreiros->save($pedreiro)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Pedreiro']);
                $dados_novos = json_encode([$user['id'],$user['username'],$pedreiro,$pessoa,$contatos,$endereco]);
                if($this->Modificacoes->emiteLog('Pedreiros','add',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('O pedreiro foi salvo com sucesso.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O pedreiro não pode ser salvo. Tente novamente mais tarde.'));
        }
        $pessoas = $this->Pedreiros->Pessoas->find('list', ['limit' => 200]);
        $pedreiroSituacoes = $this->Pedreiros->PedreiroSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('pedreiro', 'pessoas', 'pedreiroSituacoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedreiro = $this->Pedreiros->get($id, [
            'contain' => ['Pessoas','Pessoas.Contatos','Pessoas.Enderecos','PedreiroSituacoes']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();

            $dados_pessoa = $dados['pessoa'];
            $dados_pessoa['nome'] = (!empty($dados_pessoa['nome'])?$dados_pessoa['nome']: null);
            $dados_pessoa['nome_social'] = (!empty($dados_pessoa['nome_social'])?$dados_pessoa['nome_social']: null);
            $dados_pessoa['profissao'] = (!empty($dados_pessoa['profissao'])?$dados_pessoa['profissao']: null);
            $dados_pessoa['nacionalidade'] = (!empty($dados_pessoa['nacionalidade'])?$dados_pessoa['nacionalidade']: null);
            $dados_pessoa['naturalidade'] = (!empty($dados_pessoa['naturalidade'])?$dados_pessoa['naturalidade']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados_pessoa['estado_civil'])?$dados_pessoa['estado_civil']: null);
            $dados_pessoa['conjuge_id'] = (!empty($dados['conjugeHiddenPessoa'])?$dados['conjugeHiddenPessoa']: null);
            //$dados_pessoa['filhos'] = (!empty($dados_pessoa['filhos'])?$dados_pessoa['filhos']: 0);
            $dados_pessoa['sexo'] = (!empty($dados_pessoa['sexo'])?$dados_pessoa['sexo']: null);
            //$dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados_pessoa['data_nascimento']);
            $dados_pessoa['data_nascimento'] = ($dados_pessoa['data_nascimento']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] = (!empty($dados_pessoa['cpf_cnpj'])?preg_replace('/[^0-9]/', '', $dados_pessoa['cpf_cnpj']): null);
            $dados_pessoa['rg'] = (!empty($dados_pessoa['rg'])?$dados_pessoa['rg']: null);
            $dados_pessoa['u_id'] = $user['id'];
            $pessoa = $this->Pedreiros->Pessoas->get($pedreiro->pessoa_id);
            $pessoa = $this->Pedreiros->Pessoas->patchEntity($pessoa,$dados_pessoa);

            //dd($dados_pessoa,$pessoa);

            if(!$this->Pedreiros->Pessoas->save($pessoa)){
                $this->Flash->error(__('Erro ao gravar pessoa.'));
                return $this->redirect(['action' => 'index']);
            }

            $dados_endereco = $dados['endereco'];
            //$dados_endereco['pessoa_id'] = $pessoa->id;
            $dados_endereco['logradouro'] = (!empty($dados_endereco['logradouro'])?$dados_endereco['logradouro']: null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?preg_replace("/[^0-9,]/", "",$dados_endereco['numero']): null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?$dados_endereco['numero']: null);
            $dados_endereco['numero'] = (!empty($dados_endereco['numero'])?$dados_endereco['numero']: null);
            $dados_endereco['cep'] = (!empty($dados_endereco['cep'])?preg_replace('/[^0-9]/', '', $dados_endereco['cep']): null);
            $dados_endereco['cidade'] = (!empty($dados_endereco['cidade'])?$dados_endereco['cidade']: null);
            $dados_endereco['estado'] = (!empty($dados_endereco['estado'])?$dados_endereco['estado']: null);
            //$dados_endereco['principal'] = 'S';
            $dados_endereco['u_id'] = $user['id'];

            $endereco = $this->Pedreiros->Pessoas->Enderecos->get($dados['endereco']['endereco_id']);
            $endereco = $this->Pedreiros->Pessoas->Enderecos->patchEntity($endereco,$dados_endereco);
            if(!$this->Pedreiros->Pessoas->Enderecos->save($endereco)){
                $this->Flash->error(__('Erro ao grava endereco.'));
                return $this->redirect(['action' => 'index']);
            }

            //$dados_contato[0]['pessoa_id'] = $pessoa->id;
            $dados_contato[0]['tipo'] = 'telefone';
            $dados_contato[0]['valor'] = (!empty($dados_pessoa['telefone'])?$dados_pessoa['telefone']: null);
            //$dados_contato[0]['principal'] = 'S';
            $dados_contato[0]['u_id'] = $user['id'];
            $telefone = $this->Pedreiros->Pessoas->Contatos->get($dados['telefone_id']);
            $telefone = $this->Pedreiros->Pessoas->Contatos->patchEntity($telefone,$dados_contato[0]);


            //$dados_contato[1]['pessoa_id'] = $pessoa->id;
            $dados_contato[1]['tipo'] = 'email';
            $dados_contato[1]['valor'] = (!empty($dados_pessoa['email'])?$dados_pessoa['email']: null);
            //$dados_contato[1]['principal'] = 'N';
            $dados_contato[1]['u_id'] = $user['id'];
            $email = $this->Pedreiros->Pessoas->Contatos->get($dados['email_id']);
            $email = $this->Pedreiros->Pessoas->Contatos->patchEntity($email,$dados_contato[1]);

            $contatos = [$telefone,$email];
            //$contatos = $this->Pedreiros->Pessoas->Contatos->newEntities($dados_contato);//saveMany
            if(!$this->Pedreiros->Pessoas->Contatos->saveMany($contatos)){
                $this->Flash->error(__('Erro ao grava contatos.'));
                return $this->redirect(['action' => 'index']);
            }

            $dados_pedreiro['pessoa_id'] = $pessoa->id;
            $dados_pedreiro['observacao'] = $dados['observacao'];
            $dados_pedreiro['pedreiro_situacao_id'] = $dados['pedreiro_situacao_id'];
            $dados_pedreiro['u_id'] = $user['id'];
            $pedreiro = $this->Pedreiros->patchEntity($pedreiro, $dados_pedreiro);

            if ($this->Pedreiros->save($pedreiro)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'],$user['username'],'Editar Pedreiro']);
                $dados_novos = json_encode([$user['id'],$user['username'],$pedreiro,$pessoa,$contatos,$endereco]);
                if($this->Modificacoes->emiteLog('Pedreiros','edit',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('O pedreiro foi editado com sucesso.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O pedreiro não pode ser editado. Tente novamente mais tarde.'));
        }

        $pessoas = $this->Pedreiros->Pessoas->find('list', ['limit' => 200]);
        $pedreiroSituacoes = $this->Pedreiros->PedreiroSituacoes->find('list', ['limit' => 200]);
        $this->set(compact('pedreiro', 'pessoas', 'pedreiroSituacoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedreiro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedreiro = $this->Pedreiros->get($id);
        if ($this->Pedreiros->delete($pedreiro)) {
            $this->Flash->success(__('O pedreiro foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('O pedreiro não foi excluído. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
