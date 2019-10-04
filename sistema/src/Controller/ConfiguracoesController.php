<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Apoio;

/**
 * Configuracoes Controller
 *
 * @property \App\Model\Table\ConfiguracoesTable $Configuracoes
 *
 * @method \App\Model\Entity\Configuracao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfiguracoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();
        $configuracao = ($this->Configuracoes->find()->where(['empresa_id'=>$user['empresa_id']]))->first();
        $tags = Apoio::tags();
        //dd($this->request->getMethod());
        if ($this->request->is(['put','post','patch'])) {
            $dados = $this->request->getData();

            //dd($dados);
            $configuracao = $this->Configuracoes->patchEntity($configuracao,$dados);
            if ($this->Configuracoes->save($configuracao)) {
                $this->Flash->success(__('A configuração foi salva com sucesso.'));
            }else {
                $this->Flash->error(__('A configuração não pode ser salva. Tente mais tarde novamente.'));
            }

            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }
        $this->set(compact('configuracao','tags'));
    }
}
