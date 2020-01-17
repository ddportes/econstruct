<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;

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

        //dd($clientes);

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
            'contain' => ['Pessoas', 'ClienteSituacoes', 'Projetos','Pessoas.Contatos','Pessoas.Enderecos','Projetos.Contratos','Projetos.Enderecos','Projetos.Orcamentos','Projetos.Orcamentos.Projetos','Projetos.Orcamentos.Contratos','Projetos.Ocorrencias', 'Projetos.ProjetoSituacoes','Projetos.Ocorrencias.OcorrenciaTipos']
        ]);

        $this->set('cliente', $cliente);
    }

    public function retornaCliente($id=null)
    {
        $this->request->accepts('get');
        $dados = $_GET;

        $hash = $this->request->getParam('_csrfToken');

        if(!isset($dados['hash']) || $dados['hash'] != $hash){
            throw new BadRequestException();
        }
        if(!$id){
            $retorno = '';
        }else {

            $cliente = $this->Clientes->get($id, [
                'contain' => ['Pessoas', 'ClienteSituacoes', 'Projetos', 'Projetos.Enderecos', 'Pessoas.Contatos', 'Projetos.ProjetoSituacoes','Pessoas.Enderecos']
            ]);

            foreach($cliente->projetos as $val){
                $val->custo_estimado = $val->custoEstimado();
            }
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
            $pessoa = $this->Clientes->Pessoas->newEntity($dados_pessoa);
            $this->Clientes->Pessoas->save($pessoa);

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
            $endereco = $this->Clientes->Pessoas->Enderecos->newEntity($dados_endereco);
            $this->Clientes->Pessoas->Enderecos->save($endereco);

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
            $contatos = $this->Clientes->Pessoas->Contatos->newEntities($dados_contato);//saveMany
            $this->Clientes->Pessoas->Contatos->saveMany($contatos);

            $dados_cliente['pessoa_id'] = $pessoa->id;
            $dados_cliente['observacao'] = $dados['observacao'];
            $dados_cliente['empresa_id'] = $user['empresa_id'];
            $dados_cliente['cliente_situacao_id'] = $dados['cliente_situacao_id'];
            $dados_cliente['u_id'] = $user['id'];
            $cliente = $this->Clientes->patchEntity($cliente, $dados_cliente);

            if ($this->Clientes->save($cliente)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Cliente']);
                $dados_novos = json_encode([$user['id'],$user['username'],$cliente,$pessoa,$contatos,$endereco]);
                if($this->Modificacoes->emiteLog('Clientes','add',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('o cliente foi salvo com sucesso.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cliente não pode ser salvo. Tente novamente mais tarde.'));
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
            'contain' => ['Pessoas','Pessoas.Contatos','Pessoas.Enderecos','ClienteSituacoes']
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
            $pessoa = $this->Clientes->Pessoas->get($cliente->pessoa_id);
            $pessoa = $this->Clientes->Pessoas->patchEntity($pessoa,$dados_pessoa);

            //dd($dados_pessoa,$pessoa);

            if(!$this->Clientes->Pessoas->save($pessoa)){
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

            $endereco = $this->Clientes->Pessoas->Enderecos->get($dados['endereco']['endereco_id']);
            $endereco = $this->Clientes->Pessoas->Enderecos->patchEntity($endereco,$dados_endereco);
            if(!$this->Clientes->Pessoas->Enderecos->save($endereco)){
                $this->Flash->error(__('Erro ao grava endereco.'));
                return $this->redirect(['action' => 'index']);
            }

            //$dados_contato[0]['pessoa_id'] = $pessoa->id;
            $dados_contato[0]['tipo'] = 'telefone';
            $dados_contato[0]['valor'] = (!empty($dados_pessoa['telefone'])?$dados_pessoa['telefone']: null);
            //$dados_contato[0]['principal'] = 'S';
            $dados_contato[0]['u_id'] = $user['id'];
            $telefone = $this->Clientes->Pessoas->Contatos->get($dados['telefone_id']);
            $telefone = $this->Clientes->Pessoas->Contatos->patchEntity($telefone,$dados_contato[0]);


            //$dados_contato[1]['pessoa_id'] = $pessoa->id;
            $dados_contato[1]['tipo'] = 'email';
            $dados_contato[1]['valor'] = (!empty($dados_pessoa['email'])?$dados_pessoa['email']: null);
            //$dados_contato[1]['principal'] = 'N';
            $dados_contato[1]['u_id'] = $user['id'];
            $email = $this->Clientes->Pessoas->Contatos->get($dados['email_id']);
            $email = $this->Clientes->Pessoas->Contatos->patchEntity($email,$dados_contato[1]);

            $contatos = [$telefone,$email];
            //$contatos = $this->Clientes->Pessoas->Contatos->newEntities($dados_contato);//saveMany
            if(!$this->Clientes->Pessoas->Contatos->saveMany($contatos)){
                $this->Flash->error(__('Erro ao grava contatos.'));
                return $this->redirect(['action' => 'index']);
            }

            $dados_cliente['pessoa_id'] = $pessoa->id;
            $dados_cliente['observacao'] = $dados['observacao'];
            $dados_cliente['cliente_situacao_id'] = $dados['cliente_situacao_id'];
            $dados_cliente['u_id'] = $user['id'];
            $cliente = $this->Clientes->patchEntity($cliente, $dados_cliente);

            if ($this->Clientes->save($cliente)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'],$user['username'],'Editar Cliente']);
                $dados_novos = json_encode([$user['id'],$user['username'],$cliente,$pessoa,$contatos,$endereco]);
                if($this->Modificacoes->emiteLog('Clientes','edit',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('o cliente foi editado com sucesso.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cliente não pode ser editado. Tente novamente mais tarde.'));
        }

        /*
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('O cliente foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cliente não pode ser salvo. Tente novamente mais tarde.'));
        }
        */
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
        $cliente = $this->Clientes->get($id,['contain'=>['Pessoas','Pessoas.Contatos','Pessoas.Enderecos','Projetos','Projetos.Contratos','Projetos.Orcamentos']]);

        if(count($cliente->projetos) > 0){
            foreach($cliente->projetos as $p){
                if($p->hasContrato()){
                    $this->Flash->error(__('Exclua o contrato do projeto '.$p->descricao.' desse cliente para poder excluí-lo.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
        }

        if ($this->Clientes->delete($cliente)) {
            $pessoa = $cliente->pessoa;
            if ($this->Clientes->Pessoas->delete($pessoa)) {
                $contatos = $cliente->pessoa->contatos;
                foreach($contatos as $c){
                    $this->Clientes->Pessoas->Contatos->delete($c);
                }
                $enderecos = $cliente->pessoa->enderecos;
                foreach($enderecos as $e){
                    $this->Clientes->Pessoas->Enderecos->delete($e);
                }

                $projetos = $cliente->projetos;
                foreach($projetos as $p){
                    $orcamentos = $p->orcamentos;
                    foreach($orcamentos as $o){
                        $this->Clientes->Projetos->Orcamentos->delete($o);
                    }
                    $this->Clientes->Projetos->delete($p);
                }


                $this->Flash->success(__('The cliente has been deleted.'));
            }
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
