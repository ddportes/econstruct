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
            'contain' => ['Pessoas', 'ClienteSituacoes', 'Projetos','Pessoas.Contatos','Pessoas.Enderecos']
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

    public function addConjuge($conjuge_id = null){
        $user = $this->Auth->user();

        if ($this->request->is('post')) {
            $this->loadModel('Pessoas');
            $this->loadModel('Contatos');
            $this->loadModel('Modificacoes');

            $dados = $this->request->getData();

            $dados_pessoa['id'] = '';
            $dados_cliente['observacao'] = '';
            $dados_contatos['valor'] = '';

            $dados_pessoa['nome'] = (!empty($dados['nomePessoa'])?$dados['nomePessoa']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialPessoa'])?$dados['nomeSocialPessoa']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilPessoa'])?$dados['estadoCivilPessoa']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = (!empty($dados['filhosPessoa'])?$dados['filhosPessoa']: 0);
            $dados_pessoa['sexo'] = (!empty($dados['sexoPessoa'])?$dados['sexoPessoa']: null);
            $dados_pessoa['tipo'] = 'F';
            $dados_pessoa['cpf_cnpj'] = (!empty($dados['cpfPessoaConjuge'])?preg_replace('/[^0-9]/', '', $dados['cpfPessoaConjuge']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgPessoa'])?$dados['rgPessoa']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];
            $pessoa = $this->Pessoas->newEntity($dados_pessoa);

            if ($this->Pessoas->save($pessoa)) {
                $dados_cliente['pessoa_id'] = $pessoa->id;
                $dados_cliente['cliente_situacao_id'] = 1;
                $dados_cliente['observacao'] = (!empty($dados['observacaoCliente'])?$dados['observacaoCliente']: null);
                $dados_cliente['empresa_id'] = $user['empresa_id'];
                $dados_cliente['u_id'] = $user['id'];
                $cliente = $this->Clientes->newEntity($dados_cliente);
                if ($this->Clientes->save($cliente)) {
                    //cria contato;
                    $dados_contato[0]['pessoa_id'] = $pessoa->id;
                    $dados_contato[0]['tipo'] = 'telefone';
                    $dados_contato[0]['valor'] = (!empty($dados['telefoneCliente'])?$dados['telefoneCliente']: null);
                    $dados_contato[0]['principal'] = 'S';
                    $dados_contato[0]['empresa_id'] = $user['empresa_id'] ;
                    $dados_contato[0]['u_id'] = $user['id'];

                    $contatos = $this->Contatos->newEntities($dados_contato);//saveMany
                    if ($this->Contatos->saveMany($contatos)) {
                        $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Conjuge']);
                        $dados_novos = json_encode([$user['id'],$user['username'],$contatos,$cliente,$pessoa]);
                        if($this->Modificacoes->emiteLog('Clientes','addConjuge',$dados_originais,$dados_novos)) {
                            //$this->Flash->success(__('Cônjuge cadastrada(o) com sucesso.'));
                        }else{
                            //$this->Flash->error(__('Erro ao gravar log.'));
                        }
                    }else{
                        //$this->Flash->error(__('Erro ao gravar Contatos. Tente Novamente.'));
                        $this->Clientes->delete($cliente);
                        $this->Pessoas->delete($pessoa);
                    }
                }else{
                    //$this->Flash->error(__('Erro ao gravar Cliente. Tente Novamente.'));
                    $this->Pessoas->delete($pessoa);
                }

            }else {
                //$this->Flash->error(__('Erro ao gravar Pessoa. Tente Novamente.'));
            }
        }
        if($conjuge_id || (isset($cliente->id) && !empty($cliente->id))){
            if(empty($conjuge_id)){
                $conjuge_id = $cliente->id;
            }

            $conjuge = $this->Clientes->find()->where(['pessoa_id'=>$conjuge_id])->contain(['Pessoas','Pessoas.Contatos']);
            $this->set('conjuge',$conjuge->first());
        }

        $this->set(compact('conjuge_id'));
    }



    public function editConjuge($conjuge_id){
        $user = $this->Auth->user();

        $conjuge = ($this->Clientes->find()->where(['pessoa_id'=>$conjuge_id])->contain(['Pessoas','Pessoas.Contatos']))->first();

        if ($this->request->is('post')) {
            $this->loadModel('Pessoas');
            $this->loadModel('Contatos');
            $this->loadModel('Modificacoes');

            $dados = $this->request->getData();

            $dados_cliente['observacao'] = '';
            $dados_contatos['valor'] = '';
            $dados_pessoa['nome'] = (!empty($dados['nomePessoa'])?$dados['nomePessoa']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialPessoa'])?$dados['nomeSocialPessoa']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilPessoa'])?$dados['estadoCivilPessoa']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = (!empty($dados['filhosPessoa'])?$dados['filhosPessoa']: 0);
            $dados_pessoa['sexo'] = (!empty($dados['sexoPessoa'])?$dados['sexoPessoa']: null);
            $dados_pessoa['tipo'] = 'F';
            $dados_pessoa['cpf_cnpj'] =  (!empty($dados['cpfPessoaConjuge'])?preg_replace('/[^0-9]/', '', $dados['cpfPessoaConjuge']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgPessoa'])?$dados['rgPessoa']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];

            $pessoa = $this->Pessoas->get($conjuge_id,['contain'=>['Contatos']]);
            $pessoa = $this->Pessoas->patchEntity($pessoa,$dados_pessoa);
            if ($this->Pessoas->save($pessoa)) {
                $dados_cliente['pessoa_id'] = $pessoa->id;
                $dados_cliente['cliente_situacao_id'] = 1;
                $dados_cliente['observacao'] = (!empty($dados['observacaoCliente'])?$dados['observacaoCliente']: null);
                $dados_cliente['empresa_id'] = $user['empresa_id'];
                $dados_cliente['u_id'] = $user['id'];
                $cliente = $this->Clientes->patchEntity($conjuge,$dados_cliente);
                if ($this->Clientes->save($cliente)) {
                    foreach($pessoa->contatos as $val){
                        if($val->tipo == 'telefone'){
                            $val->valor = (!empty($dados['telefoneCliente'])?$dados['telefoneCliente']: null);
                            $val->u_id = $user['id'];
                        }
                    }
                    $contatos = $pessoa->contatos;
                    if ($this->Contatos->saveMany($contatos)) {
                        $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Conjuge']);
                        $dados_novos = json_encode([$user['id'],$user['username'],$contatos,$cliente,$pessoa]);
                        if($this->Modificacoes->emiteLog('Clientes','addConjuge',$dados_originais,$dados_novos)) {
                            //$this->Flash->success(__('Cônjuge editada(o) com sucesso.'));
                        }else{
                            //$this->Flash->error(__('Erro ao gravar log.'));
                        }
                    }else{
                        //$this->Flash->error(__('Erro ao gravar Contatos. Tente Novamente.'));
                    }
                }else{
                    //$this->Flash->error(__('Erro ao gravar Cliente. Tente Novamente.'));
                }
            }else {
                //$this->Flash->error(__('Erro ao gravar Pessoa. Tente Novamente.'));
            }
        }

        $this->set(compact('conjuge_id','conjuge'));
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
