<?php
namespace App\Controller;
use Cake\Http\Exception\NotFoundException;
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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($pessoa_id=null)
    {
        if(empty($pessoa_id)){
            throw new NotFoundException('Selecione um cliente');
        }

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
            $pessoas[$pessoa->id] = 'Titular - '.$pessoa->nome;

            $todas_rendas_bruta = null;
            $todas_rendas_liquida = null;

            $criterio = $pessoa->id;
            if($pessoa->conjuge_id){
                $conjuge = $this->Rendas->Pessoas->get($pessoa->conjuge_id,['contain'=>['Rendas']]);

                if($conjuge) {
                    $pessoas[$conjuge->id] = 'Conjuge - '.$conjuge->nome;
                    $criterio .= ",".$conjuge->id;
                }
            }

            $dependentes = $this->Rendas->Pessoas->Dependentes->find('all')->where(['pai_mae_id'=>$pessoa_id])->contain(['Pessoas','Pessoas.Rendas']);
            $crit_dep = '';
            foreach($dependentes as $d){
                $pessoas[$d->pessoa->id] = 'Dependente - '.$d->pessoa->nome;
                $crit_dep .= ",".$d->pessoa->id;
                $todas_rendas_bruta[]=$d->pessoa->totalRendaBruta();
                $todas_rendas_liquida[]=$d->pessoa->totalRendaLiquida();
            }

            $criterio .= $crit_dep;

            $rendas = $this->Rendas->find()->where(["pessoa_id in (".$criterio.")"])->contain(['Pessoas']);
        }

        if($conjuge){
            $todas_rendas_bruta[]=$conjuge->totalRendaBruta();
            $todas_rendas_liquida[]=$conjuge->totalRendaLiquida();
        }

        $this->set(compact('renda', 'rendas','pessoa_id','pessoa','pessoas','conjuge','todas_rendas_bruta','todas_rendas_liquida'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Renda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$pessoa_id=null)
    {
        if(empty($id) || empty($pessoa_id)){
            throw new NotFoundException('Selecione a renda a ser excluída');
        }

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
