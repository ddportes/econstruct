<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function configuracoes($empresa_id = null)
    {
        $configuracoes = $this->paginate($this->Configuracoes);

        $this->set(compact('configuracoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Configuracao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function tags($empresa_id = null)
    {
        $configuracao = $this->Configuracoes->get($empresa_id, [
            'contain' => ['Empresas']
        ]);

        $this->set('configuracao', $configuracao);
    }

    /**
     * Configurar method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function configurar($empresa_id = null)
    {
        $configuracao = $this->Configuracoes->newEntity();
        if ($this->request->is('post')) {
            $configuracao = $this->Configuracoes->patchEntity($configuracao, $this->request->getData());
            if ($this->Configuracoes->save($configuracao)) {
                $this->Flash->success(__('The configuracao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuracao could not be saved. Please, try again.'));
        }
        $empresas = $this->Configuracoes->Empresas->find('list', ['limit' => 200]);

        $this->set(compact('configuracao', 'empresas'));
    }
}
