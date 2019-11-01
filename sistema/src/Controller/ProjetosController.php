<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 *
 * @method \App\Model\Entity\Projeto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjetosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes',
                          'Clientes.Pessoas',
                          'ProjetoSituacoes',
                          'Contratos',
                          'Recebimentos',
                          'Orcamentos',
                          'Ocorrencias',
                          'Ocorrencias.OcorrenciaTipos',
                          'Recibos',
                          'Notas',
                          'Equipes',
                          'Equipes.EquipePedreiros',
                          'Equipes.EquipePedreiros.Pedreiros',
                          'Equipes.EquipePedreiros.Pedreiros.Pessoas',
                          'Enderecos']
        ];
        $projetos = $this->paginate($this->Projetos);

        $this->set(compact('projetos'));
    }

    /**
     * View method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projeto = $this->Projetos->get($id, [
            'contain' => ['Clientes',
                'Clientes.Pessoas',
                'ProjetoSituacoes',
                'Contratos',
                'Contratos.Orcamentos',
                'Recebimentos',
                'Orcamentos',
                'Orcamentos.Contratos',
                'Ocorrencias',
                'Ocorrencias.OcorrenciaTipos',
                'Recibos',
                'Notas',
                'Equipes',
                'Equipes.EquipePedreiros',
                'Equipes.EquipePedreiros.Pedreiros',
                'Equipes.EquipePedreiros.Pedreiros.Pessoas',
                'Enderecos']
        ]);

        $this->set('projeto', $projeto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projetos->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();

            $dados['empresa_id'] = $user['empresa_id'];
            $dados['u_id'] = $user['id'];

            $dados['endereco']['pessoa_id'] = null;
            $dados['endereco']['logradouro'] = (!empty($dados['endereco']['logradouro'])?$dados['endereco']['logradouro']: null);
            $dados['endereco']['numero'] = (!empty($dados['endereco']['numero'])?preg_replace("/[^0-9,]/", "",$dados['endereco']['numero']): null);
            $dados['endereco']['complemento'] = (!empty($dados['endereco']['complemento'])?$dados['endereco']['complemento']: null);
            $dados['endereco']['bairro'] = (!empty($dados['endereco']['bairro'])?$dados['endereco']['bairro']: null);
            $dados['endereco']['cep'] = (!empty($dados['endereco']['cep'])?preg_replace('/[^0-9]/', '', $dados['endereco']['cep']): null);
            $dados['endereco']['cidade'] = (!empty($dados['endereco']['cidade'])?$dados['endereco']['cidade']: null);
            $dados['endereco']['estado'] = (!empty($dados['endereco']['estado'])?$dados['endereco']['estado']: null);
            $dados['endereco']['principal'] = 'S';
            $dados['endereco']['empresa_id'] = $user['empresa_id'];
            $dados['endereco']['u_id'] = $user['id'];

            $endereco = $this->Projetos->Enderecos->newEntity($dados['endereco']);
            if($this->Projetos->Enderecos->save($endereco)){

                $projeto->endereco_id = $endereco->id;
                $projeto = $this->Projetos->patchEntity($projeto, $dados);

                if ($this->Projetos->save($projeto)) {

                    $this->loadModel('Modificacoes');
                    $dados_originais = json_encode([$user['id'], $user['username'], 'Novo Projeto']);
                    $dados_novos = json_encode([$user['id'], $user['username'], $projeto, $endereco]);
                    if ($this->Modificacoes->emiteLog('Projetos', 'add', $dados_originais, $dados_novos)) {
                        $this->Flash->success(__('O projeto foi criado com sucesso.'));

                        return $this->redirect(['action' => 'index']);
                    }else{
                        $this->Flash->error(__('Erro ao gravar o log.'));
                    }
                }

                $this->Flash->error(__('Não foi possível criar o projeto. Tente novamente mais tarde.'));

            }else{
                $this->Flash->error(__('Erro ao criar o endereço.'));
            }
        }
        $clientes = $this->Projetos->Clientes->find('list', [
            'contain'=>['Pessoas'],
            'keyField'=>'id',
            'valueField'=>'pessoa.nome'
        ]);
        $projetoSituacoes = $this->Projetos->ProjetoSituacoes->find('list');
        $this->set(compact('projeto', 'clientes', 'projetoSituacoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projeto = $this->Projetos->get($id, [
            'contain' => ['Enderecos','ProjetoSituacoes','Clientes','Clientes.Pessoas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Auth->user();
            $dados = $this->request->getData();
            $dados['u_id'] = $user['id'];

            $projeto = $this->Projetos->patchEntity($projeto, $dados);
            if ($this->Projetos->save($projeto)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'], $user['username'], 'Editar Projeto']);
                $dados_novos = json_encode([$user['id'], $user['username'], $projeto]);
                if ($this->Modificacoes->emiteLog('Projetos', 'edit', $dados_originais, $dados_novos)) {
                    $this->Flash->success(__('O projeto foi editado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }else{
                    $this->Flash->error(__('Erro ao gravar o log.'));
                }
            }
            $this->Flash->error(__('Não foi possível editar o projeto. Tente novamente mais tarde.'));
        }
        $clientes = $this->Projetos->Clientes->find('list', [
                                                                'contain'=>['Pessoas'],
                                                                'keyField'=>'id',
                                                                'valueField'=>'pessoa.nome'
                                                            ]);
        $projetoSituacoes = $this->Projetos->ProjetoSituacoes->find('list');
        $this->set(compact('projeto', 'clientes', 'projetoSituacoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        if ($this->Projetos->delete($projeto)) {
            $this->Flash->success(__('O projeto foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o projeto. Tente novamente mais tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
