<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Apoio;

/**
 * Contratos Controller
 *
 * @property \App\Model\Table\ContratosTable $Contratos
 *
 * @method \App\Model\Entity\Contrato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContratosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos', 'Orcamentos', 'Empresas', 'Users']
        ];
        $contratos = $this->paginate($this->Contratos);

        $this->set(compact('contratos'));
    }

    /**
     * View method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contrato = $this->Contratos->get($id, [
            'contain' => ['Projetos', 'Orcamentos', 'Empresas', 'Users']
        ]);

        $this->set('contrato', $contrato);
    }

    /**
     * exportarPdf method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function exportarPdf($id = null)
    {
        $contrato = $this->Contratos->get($id, [
            'contain' => ['Projetos','Projetos.Clientes','Projetos.Clientes.Pessoas', 'Orcamentos', 'Empresas', 'Users']
        ]);

        $tags = $this->Contratos->tags($contrato->orcamento_id);

        if($tags['error'] <> ''){
            $this->Flash->error(__(substr($tags['error'],5,strlen($tags['error']))));

            return $this->redirect(['controller'=>'Projetos','action'=>'index']);
        }else{
            $contrato->minuta = str_replace(array_keys($tags),array_values($tags),$contrato->minuta) ;
        }

        $this->viewBuilder()
            ->className('Dompdf.Pdf')
            ->setlayout('Contrato/contratopdf')
            ->options([
                'config' => [
                    'filename' => 'Contrato '.$contrato->projeto->cliente->pessoa->nome.' - '.$contrato->projeto->descricao,
                    'render' => 'download',
                    'orientation' => 'landscape',
                    'paginate' => [
                        'x' => 1500,
                        'y' => 5,
                    ],
                ]
            ]);

        $this->set('contrato', $contrato);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id=null,$orcamento_id=null)
    {
        $user = $this->Auth->user();
        $contrato = $this->Contratos->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {

            $dados =  $this->request->getData();
            $dt = explode('/',$dados['data_assinatura']);
            $dados['data_assinatura'] = ($dados['data_assinatura']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados['empresa_id'] = $user['empresa_id'];
            $dados['u_id'] = $user['id'];

            $contrato = $this->Contratos->patchEntity($contrato, $dados);
            if ($this->Contratos->save($contrato)) {

                $projeto = $this->Contratos->Projetos->get($projeto_id);
                $projeto->contrato_id = $contrato->id;
                if ($this->Contratos->Projetos->save($projeto)) {
                    $this->Flash->success(__('Contrato criado com sucesso.'));
                    $this->loadModel('Modificacoes');
                    $dados_originais = json_encode([$user['id'], $user['username'], 'Novo Contrato']);
                    $dados_novos = json_encode([$user['id'], $user['username'], $contrato,$projeto]);

                    $this->Modificacoes->emiteLog('Contratos', 'add', $dados_originais, $dados_novos);

                    return $this->redirect(['action' => 'edit',$contrato->id,$projeto_id]);
                }else{
                    $this->Flash->error(__('O contrato não pode ser criado. Tente novamente.'));
                }

            }else {
                $this->Flash->error(__('O contrato não pode ser criado. Tente novamente.'));
            }
            return $this->redirect(['controller'=>'Orcamentos','action' => 'add',$projeto_id]);
        }
        $orcamentos = $this->Contratos->Orcamentos->todosOrcamentosCombo($projeto_id);
        if(!empty($orcamento_id)) {
            $orcamento = $this->Contratos->Orcamentos->get($orcamento_id);
            $this->set('orcamento',$orcamento);
        }
        $tags = $this->Contratos->tags();
        $this->loadModel('Configuracoes');
        $config = $this->Configuracoes->find('all')->first();

        $this->set(compact('contrato', 'orcamentos', 'projeto_id','orcamento_id','tags','config'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id,$projeto_id)
    {
        $contrato = $this->Contratos->get($id, [
            'contain' => ['Projetos','Orcamentos']
        ]);
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Auth->user();
            $dados = $this->request->getData();
            $dt = explode('/',$dados['data_assinatura']);
            $dados['data_assinatura'] = ($dados['data_assinatura']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
            $dados['u_id'] = $user['id'];

            $contrato = $this->Contratos->patchEntity($contrato, $dados);
            if ($this->Contratos->save($contrato)) {
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'], $user['username'], 'Edita Contrato']);
                $dados_novos = json_encode([$user['id'], $user['username'], $contrato]);

                $this->Modificacoes->emiteLog('Contratos', 'edit', $dados_originais, $dados_novos);

                $this->Flash->success(__('Contrato editado com sucesso.'));

            }else {
                $this->Flash->error(__('Contrato não pode ser editado. Tente novamente mais tarde.'));
            }
        }
        $tags = $this->Contratos->tags();
        $this->set(compact('contrato','projeto_id', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$projeto_id)
    {
        $user = $this->Auth->user();
        $this->request->allowMethod(['post', 'delete']);
        $contrato = $this->Contratos->get($id);

        if ($this->Contratos->delete($contrato)) {
            $projeto = $this->Contratos->Projetos->get($projeto_id);
            $projeto->contrato_id = null;
            if ($this->Contratos->Projetos->save($projeto)) {
                $this->Flash->success(__('Contrato foi removido com sucesso.'));
                $this->loadModel('Modificacoes');
                $dados_originais = json_encode([$user['id'], $user['username'], 'Exclui Contrato']);
                $dados_novos = json_encode([$user['id'], $user['username'], $contrato,$projeto]);

                $this->Modificacoes->emiteLog('Contratos', 'delete', $dados_originais, $dados_novos);
            }else{
                $this->Flash->error(__('Contrato não pode ser removido. Tente novamente.'));
            }
        } else {
            $this->Flash->error(__('Contrato não pode ser removido. Tente novamente.'));
        }

        return $this->redirect(['controller'=>'Orcamentos','action' => 'add',$projeto_id]);
    }
}
