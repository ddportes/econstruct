<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 *
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Conjuges']
        ];
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Clientes', 'Contatos', 'Enderecos', 'Fornecedores', 'Pedreiros', 'Rendas']
        ]);

        $this->set('pessoa', $pessoa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $conjuges = $this->Pessoas->Conjuges->find('list', ['limit' => 200]);
        $this->set(compact('pessoa', 'conjuges'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $conjuges = $this->Pessoas->Conjuges->find('list', ['limit' => 200]);
        $this->set(compact('pessoa', 'conjuges'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addConjuge($conjuge_id = null){
        $user = $this->Auth->user();

        if ($this->request->is('post')) {
            $this->loadModel('Contatos');
            $this->loadModel('Modificacoes');

            $dados = $this->request->getData();

            $dados_pessoa['id'] = '';
            $dados_pessoa['nome'] = (!empty($dados['nomePessoa'])?$dados['nomePessoa']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialPessoa'])?$dados['nomeSocialPessoa']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilPessoa'])?$dados['estadoCivilPessoa']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = (!empty($dados['filhosPessoa'])?$dados['filhosPessoa']: 0);
            $dados_pessoa['sexo'] = (!empty($dados['sexoPessoa'])?$dados['sexoPessoa']: null);
            $dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados['dataNascimento']);
            $dados_pessoa['data_nascimento'] = ($dados['dataNascimento']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] = (!empty($dados['cpfPessoaConjuge'])?preg_replace('/[^0-9]/', '', $dados['cpfPessoaConjuge']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgPessoa'])?$dados['rgPessoa']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];
            $pessoa = $this->Pessoas->newEntity($dados_pessoa);

            if ($this->Pessoas->save($pessoa)) {
                //cria contato;
                $dados_contato[0]['pessoa_id'] = $pessoa->id;
                $dados_contato[0]['tipo'] = 'telefone';
                $dados_contato[0]['valor'] = (!empty($dados['telefoneCliente'])?$dados['telefoneCliente']: null);
                $dados_contato[0]['principal'] = 'S';
                $dados_contato[0]['empresa_id'] = $user['empresa_id'] ;
                $dados_contato[0]['u_id'] = $user['id'];

                $contatos = $this->Pessoas->Contatos->newEntities($dados_contato);//saveMany
                if ($this->Contatos->saveMany($contatos)) {
                    $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Conjuge']);
                    $dados_novos = json_encode([$user['id'],$user['username'],$contatos,$pessoa]);
                    if($this->Modificacoes->emiteLog('Clientes','addConjuge',$dados_originais,$dados_novos)) {
                        //$this->Flash->success(__('Cônjuge cadastrada(o) com sucesso.'));
                    }else{
                        //$this->Flash->error(__('Erro ao gravar log.'));
                    }
                }else{
                    //$this->Flash->error(__('Erro ao gravar Contatos. Tente Novamente.'));
                    $this->Pessoas->delete($pessoa);
                }
            }else {
                //$this->Flash->error(__('Erro ao gravar Pessoa. Tente Novamente.'));
            }
        }
        if($conjuge_id || (isset($pessoa->id) && !empty($pessoa->id))){
            if(empty($conjuge_id)){
                $conjuge_id = $pessoa->id;
            }

            $conjuge = $this->Pessoas->get($conjuge_id,['contain'=>['Contatos']]);
        }

        $this->set(compact('conjuge_id'));
    }

    public function editConjuge($conjuge_id){
        $user = $this->Auth->user();

        $conjuge = $this->Pessoas->get($conjuge_id,['contain'=>['Contatos']]);

        if ($this->request->is('post')) {
            $this->loadModel('Contatos');
            $this->loadModel('Modificacoes');

            $dados = $this->request->getData();

            $dados_pessoa['nome'] = (!empty($dados['nomePessoa'])?$dados['nomePessoa']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialPessoa'])?$dados['nomeSocialPessoa']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilPessoa'])?$dados['estadoCivilPessoa']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = (!empty($dados['filhosPessoa'])?$dados['filhosPessoa']: 0);
            $dados_pessoa['sexo'] = (!empty($dados['sexoPessoa'])?$dados['sexoPessoa']: null);
            $dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados['dataNascimento']);
            $dados_pessoa['data_nascimento'] = ($dados['dataNascimento']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] =  (!empty($dados['cpfPessoaConjuge'])?preg_replace('/[^0-9]/', '', $dados['cpfPessoaConjuge']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgPessoa'])?$dados['rgPessoa']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];

            $pessoa = $this->Pessoas->get($conjuge_id,['contain'=>['Contatos']]);
            $pessoa = $this->Pessoas->patchEntity($pessoa,$dados_pessoa);
            if ($this->Pessoas->save($pessoa)) {
                foreach($pessoa->contatos as $val){
                    if($val->tipo == 'telefone'){
                        $val->valor = (!empty($dados['telefoneCliente'])?$dados['telefoneCliente']: null);
                        $val->u_id = $user['id'];
                    }
                }
                $contatos = $pessoa->contatos;
                if ($this->Contatos->saveMany($contatos)) {
                    $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Conjuge']);
                    $dados_novos = json_encode([$user['id'],$user['username'],$contatos,$pessoa]);
                    if($this->Modificacoes->emiteLog('Clientes','addConjuge',$dados_originais,$dados_novos)) {
                        //$this->Flash->success(__('Cônjuge editada(o) com sucesso.'));
                    }else{
                        //$this->Flash->error(__('Erro ao gravar log.'));
                    }
                }else{
                    //$this->Flash->error(__('Erro ao gravar Contatos. Tente Novamente.'));
                }

            }else {
                //$this->Flash->error(__('Erro ao gravar Pessoa. Tente Novamente.'));
            }
        }

        $this->set(compact('conjuge_id','conjuge'));
    }
}
