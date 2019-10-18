<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo[]|\Cake\Collection\CollectionInterface $modelos
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Tipos de Modelos de Documentos.
                <div class="page-title-subheading">
                    <p>Listagem dos tipos de modelos que podem ser utilizados para criação de modelos de documentos no e-Construct.</p>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" onclick="$('#menu-acoes').toggle()" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Ações
                </button>
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Tipo de Modelo').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Tipo Modelo','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Tipos de Modelos Cadastrados</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                        <tr>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('descricao','Descrição') ?></th>
                            <th style="vertical-align:top" scope="col" class="actions"><?= __('Actions','Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($modeloTipos->count() > 0): ?>
                            <?php foreach ($modeloTipos as $modeloTipo): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($modeloTipo->id) ?></th>
                                    <td><?= h($modeloTipo->descricao) ?></td>
                                    <td class="actions">
                                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $modeloTipo->id],['data'=>['id'=>$modeloTipo->id],'confirm' => __('Deseja realmente excluir o tipo de modelo {0}?', $modeloTipo->id),'Title'=>'Excluir Tipo deModelo','escape'=>false]) ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="4" scope="row"><?= __('Não há tipos de modelos cadastrados.') ?></th>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="" aria-label="Paginacao">
                    <ul class="pagination">

                        <?= $this->Paginator->first('<< ' . __('Inícial')) ?>
                        <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Próxima') . ' >') ?>
                        <?= $this->Paginator->last(__('Final') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} tipo(s) de modelo(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>