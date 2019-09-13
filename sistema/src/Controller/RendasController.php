<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rendas Controller
 *
 * @property \App\Model\Table\RendasTable $Rendas
 *
 * @method \App\Model\Entity\Renda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RendasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $rendas = $this->paginate($this->Rendas);

        $this->set(compact('rendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $renda = $this->Rendas->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('renda', $renda);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($pessoa_id = null)
    {
        $user = $sessao = $this->Auth->user();

        $rendas = null;
        $pessoa = null;
        $pessoas = null;
        $conjuge = null;
        $renda = $this->Rendas->newEntity();

        if($pessoa_id) {
            if ($this->request->is('post')) {
                $dados = $this->request->getData();
                $dados['cpf_cnpj'] =  (!empty($dados['cpf_cnpj'])?preg_replace('/[^0-9]/', '', $dados['cpf_cnpj']): null);
                $dados['renda_bruta'] = (!empty($dados['renda_bruta'])?str_replace(',','.',preg_replace("/[^0-9,]/", "", $dados['renda_bruta'])): null);
                $dados['renda_liquida'] = (!empty($dados['renda_liquida'])?str_replace(',','.',preg_replace("/[^0-9,]/", "", $dados['renda_liquida'])): null);
                $dados['empresa_id'] = $user['empresa_id'];
                $dados['u_id'] = $user['id'];

                $renda = $this->Rendas->patchEntity($renda, $dados);
                if ($this->Rendas->save($renda)) {
                   // $this->Flash->success(__('A renda foi gravada com sucesso.'));
                }
                //$this->Flash->error(__('A renda não foi gravada. Por favor, tente novamente.'));
            }
            $pessoa = $this->Rendas->Pessoas->get($pessoa_id,['contain'=>['Rendas']]);
            $pessoas[$pessoa->id] = $pessoa->nome;

            $criterio = $pessoa->id;
            if($pessoa->conjuge_id){
                $conjuge = $this->Rendas->Pessoas->get($pessoa->conjuge_id,['contain'=>['Rendas']]);

                if($conjuge) {
                    $pessoas[$conjuge->id] = $conjuge->nome;
                    $criterio .= ",{$conjuge->id}";
                }
            }

            $rendas = $this->Rendas->find()->where(["pessoa_id in (".$criterio.")"])->contain(['Pessoas']);
        }

        $todas_rendas_bruta = null;
        $todas_rendas_liquida = null;

        if($conjuge){
            $todas_rendas_bruta[]=$conjuge->totalRendaBruta();
            $todas_rendas_liquida[]=$conjuge->totalRendaLiquida();
        }

        $this->set(compact('renda', 'rendas','pessoa_id','pessoa','pessoas','conjuge','todas_rendas_bruta','todas_rendas_liquida'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $renda = $this->Rendas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $renda = $this->Rendas->patchEntity($renda, $this->request->getData());
            if ($this->Rendas->save($renda)) {
                $this->Flash->success(__('The renda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The renda could not be saved. Please, try again.'));
        }
        $pessoas = $this->Rendas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('renda', 'pessoas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$pessoa_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $renda = $this->Rendas->get($id);

        if ($this->Rendas->delete($renda)) {
            //$this->Flash->success(__('The renda has been deleted.'));
        } else {
            //$this->Flash->error(__('The renda could not be deleted. Please, try again.'));
        }
        $this->set('pessoa_id',$pessoa_id);

        return $this->redirect(['action' => 'add',$pessoa_id]);
    }
}
