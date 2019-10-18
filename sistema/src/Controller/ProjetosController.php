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

            $projeto = $this->Projetos->patchEntity($projeto, $dados);
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('O projeto foi criado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O foi possível criar o projeto. Tente novamente mais tarde.'));
        }
        $clientes = $this->Projetos->Clientes->clientes();
        $projetoSituacoes = $this->Projetos->ProjetoSituacoes->find('list', ['limit' => 200]);
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
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('O projeto foi editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível editar o projeto. Tente novamente mais tarde.'));
        }
        $clientes = $this->Projetos->Clientes->find('list', ['limit' => 200]);
        $projetoSituacoes = $this->Projetos->ProjetoSituacoes->find('list', ['limit' => 200]);
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
