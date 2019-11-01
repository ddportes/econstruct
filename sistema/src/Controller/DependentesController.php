<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dependentes Controller
 *
 * @property \App\Model\Table\DependentesTable $Dependentes
 *
 * @method \App\Model\Entity\Dependente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DependentesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'PaiMaes', 'Empresas', 'Us']
        ];
        $dependentes = $this->paginate($this->Dependentes);

        $this->set(compact('dependentes'));
    }

    /**
     * View method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependente = $this->Dependentes->get($id, [
            'contain' => ['Pessoas', 'PaiMaes', 'Empresas', 'Us']
        ]);

        $this->set('dependente', $dependente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($pai_mae_id)
    {
        $user = $this->Auth->user();
        if ($this->request->is('post')) {
            $this->loadModel('Modificacoes');
            $dados = $this->request->getData();

            $dados_pessoa['id'] = '';
            $dados_pessoa['nome'] = (!empty($dados['nomeDependente'])?$dados['nomeDependente']: null);
            $dados_pessoa['nome_social'] = (!empty($dados['nomeSocialDependente'])?$dados['nomeSocialDependente']: null);
            $dados_pessoa['profissao'] = (!empty($dados['profissaoDependente'])?$dados['profissaoDependente']: null);
            $dados_pessoa['nacionalidade'] = (!empty($dados['nacionalidadeDependente'])?$dados['nacionalidadeDependente']: null);
            $dados_pessoa['naturalidade'] = (!empty($dados['naturalidadeDependente'])?$dados['naturalidadeDependente']: null);
            $dados_pessoa['estado_civil'] = (!empty($dados['estadoCivilDependente'])?$dados['estadoCivilDependente']: null);
            $dados_pessoa['conjuge_id'] = null;
            $dados_pessoa['filhos'] = 0;
            $dados_pessoa['sexo'] = (!empty($dados['sexoDependente'])?$dados['sexoDependente']: null);
            $dados_pessoa['tipo'] = 'F';
            $dt = explode('/',$dados['dataNascimento']);
            $dados_pessoa['data_nascimento'] = ($dados['dataNascimento']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados_pessoa['cpf_cnpj'] = (!empty($dados['cpfDependente'])?preg_replace('/[^0-9]/', '', $dados['cpfDependente']): null);
            $dados_pessoa['rg'] = (!empty($dados['rgDependente'])?$dados['rgDependente']: null);
            $dados_pessoa['empresa_id'] = $user['empresa_id'];
            $dados_pessoa['u_id'] = $user['id'];
            $pessoa = $this->Dependentes->Pessoas->newEntity($dados_pessoa);

            if ($this->Dependentes->Pessoas->save($pessoa)) {
                $dados_dependente['pessoa_id'] = $pessoa->id;
                $dados_dependente['pai_mae_id'] = $pai_mae_id;
                $dados_dependente['empresa_id'] = $user['empresa_id'];
                $dados_dependente['u_id'] = $user['id'];

                $dependente = $this->Dependentes->newEntity($dados_dependente);

                if ($this->Dependentes->save($dependente)) {
                    //dd($dependente);

                    $dados_originais = json_encode([$user['id'],$user['username'],'Cadastro Dependente']);
                    $dados_novos = json_encode([$user['id'],$user['username'],$dependente,$pessoa]);
                    if($this->Modificacoes->emiteLog('Dependentes','add',$dados_originais,$dados_novos)) {
                        //$this->Flash->success(__('Cônjuge cadastrada(o) com sucesso.'));
                    }else{
                        //$this->Flash->error(__('Erro ao gravar log.'));
                    }
                }else{

                }

            }else{
                //$this->Flash->error(__('Não foi possível gravar pessoa.'));
            }
        }
        $paiMae = $this->Dependentes->Pessoas->get($pai_mae_id);
        $dependentes = $this->Dependentes->find('all')->where(['pai_mae_id'=>$pai_mae_id])->contain(['Pessoas']);

        $this->set(compact( 'dependentes','paiMae','pai_mae_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependente = $this->Dependentes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependente = $this->Dependentes->patchEntity($dependente, $this->request->getData());
            if ($this->Dependentes->save($dependente)) {
                $this->Flash->success(__('The dependente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependente could not be saved. Please, try again.'));
        }
        $pessoas = $this->Dependentes->Pessoas->find('list', ['limit' => 200]);
        $paiMaes = $this->Dependentes->PaiMaes->find('list', ['limit' => 200]);
        $empresas = $this->Dependentes->Empresas->find('list', ['limit' => 200]);
        $us = $this->Dependentes->Us->find('list', ['limit' => 200]);
        $this->set(compact('dependente', 'pessoas', 'paiMaes', 'empresas', 'us'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$pai_mae_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependente = $this->Dependentes->get($id);
        if ($this->Dependentes->delete($dependente)) {
            //$this->Flash->success(__('The dependente has been deleted.'));
        } else {
            //$this->Flash->error(__('The dependente could not be deleted. Please, try again.'));
        }
        $this->set('pai_mae_id',$pai_mae_id);
        return $this->redirect(['action' => 'add',$pai_mae_id]);

    }
}
