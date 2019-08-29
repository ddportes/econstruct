<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutoTipos Controller
 *
 * @property \App\Model\Table\ProdutoTiposTable $ProdutoTipos
 *
 * @method \App\Model\Entity\ProdutoTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutoTiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $produtoTipos = $this->paginate($this->ProdutoTipos);

        $this->set(compact('produtoTipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Produto Tipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtoTipo = $this->ProdutoTipos->get($id, [
            'contain' => ['Produtos']
        ]);

        $this->set('produtoTipo', $produtoTipo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtoTipo = $this->ProdutoTipos->newEntity();
        if ($this->request->is('post')) {
            $produtoTipo = $this->ProdutoTipos->patchEntity($produtoTipo, $this->request->getData());
            if ($this->ProdutoTipos->save($produtoTipo)) {
                $this->Flash->success(__('The produto tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produto tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('produtoTipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto Tipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtoTipo = $this->ProdutoTipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtoTipo = $this->ProdutoTipos->patchEntity($produtoTipo, $this->request->getData());
            if ($this->ProdutoTipos->save($produtoTipo)) {
                $this->Flash->success(__('The produto tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produto tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('produtoTipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtoTipo = $this->ProdutoTipos->get($id);
        if ($this->ProdutoTipos->delete($produtoTipo)) {
            $this->Flash->success(__('The produto tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The produto tipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
