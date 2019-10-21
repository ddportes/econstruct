<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Exception\BadRequestException;

/**
 * Orcamentos Controller
 *
 * @property \App\Model\Table\OrcamentosTable $Orcamentos
 *
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcamentosController extends AppController
{

    public function retornaOrcamento($id=null)
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

            $orcamento = $this->Orcamentos->get($id, [
                'contain' => ['Projetos']
            ]);
            $orcamento->custo = $orcamento->custo();
            $orcamento->total = $orcamento->total();
            $orcamento->projeto->custo_estimado = $orcamento->projeto->custoEstimado();
            $retorno = json_encode($orcamento);
        }

        $this->set(compact('retorno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id = null)
    {
        if(empty($projeto_id)){
            throw new NotFoundException('Selecione um cliente');
        }

        $user = $sessao = $this->Auth->user();
        $orcamentos = null;
        $projeto = null;
        $orcamento = $this->Orcamentos->newEntity();
        if($projeto_id) {
            $projeto = $this->Orcamentos->Projetos->get($projeto_id,['contain'=>['Clientes','Clientes.Pessoas']]);
            if ($this->request->is('post')) {
                $dados = $this->request->getData();

                $dt = explode('/',$dados['data_inicial']);
                $dados['data_inicial'] = ($dados['data_inicial']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
                $dt = explode('/',$dados['data_entrega']);
                $dados['data_entrega'] = ($dados['data_entrega']<>''? date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0])):null);
                $dados['custo'] = (!empty($dados['custo'])?str_replace(',','.',preg_replace("/[^0-9,]/", "", $dados['custo'])): null);
                $dados['total'] = (!empty($dados['total'])?str_replace(',','.',preg_replace("/[^0-9,]/", "", $dados['total'])): null);
                $dados['empresa_id'] = $user['empresa_id'];
                $dados['u_id'] = $user['id'];

                if (!empty($dados['id'])) {
                    $orcamento = $this->Orcamentos->get($dados['id']);
                }

                $orcamento = $this->Orcamentos->patchEntity($orcamento, $dados);

                if ($this->Orcamentos->save($orcamento)) {
                    $this->loadModel('Modificacoes');
                    $dados_originais = json_encode([$user['id'], $user['username'], 'Novo Orçamento']);
                    $dados_novos = json_encode([$user['id'], $user['username'], $orcamento]);

                    $this->Modificacoes->emiteLog('Orcamentos', 'add', $dados_originais, $dados_novos);

                    $this->Flash->success(__('O orçamento foi alvo com sucesso.'));
                }else{
                    $this->Flash->error(__('O orçamento não pode ser salvo. Tente novamente.'));
                }

            }
            $orcamentos = $this->Orcamentos->find()->where(["projeto_id"=>$projeto_id])->contain(['Projetos','Contratos','Projetos.Contratos']);
        }


        $this->set(compact('orcamento','orcamentos','projeto_id','projeto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$projeto_id=null)
    {
        if(empty($id) || empty($projeto_id)){
            throw new NotFoundException('Selecione o orçamento a ser excluído');
        }

        $this->request->allowMethod(['post', 'delete']);
        $orcamento = $this->Orcamentos->get($id);

        if ($this->Orcamentos->delete($orcamento)) {
            $this->Flash->success(__('O orçamento foi excluído com sucesso.'));
            $user = $sessao = $this->Auth->user();
            $this->loadModel('Modificacoes');
            $dados_originais = json_encode([$user['id'], $user['username'], 'Exclui Orçamento']);
            $dados_novos = json_encode([$user['id'], $user['username'], $orcamento]);

            $this->Modificacoes->emiteLog('Orcamentos', 'delete', $dados_originais, $dados_novos);
        } else {
            $this->Flash->error(__('O orçamento não pode ser excluído. Tente novamente.'));
        }
        $this->set('projeto_id',$projeto_id);

        return $this->redirect(['action' => 'add',$projeto_id]);
    }
}
