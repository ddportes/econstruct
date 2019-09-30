<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Projetos.
                <div class="page-title-subheading">
                    <p>Listagem de todos os projetos já cadastrados.</p>
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
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Projeto').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Projeto','class'=>'nav-link','escape'=>false]) ?>
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
            <div class="card-body"><h5 class="card-title">Projetos Cadastrados</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                        <tr>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('descricao','Descrição') ?></th>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('cliente_id','Cliente') ?></th>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('projeto_situacao_id','Situação') ?></th>
                            <th style="vertical-align:top" scope="col"><?= h('Equipe') ?></th>
                            <th style="vertical-align:top" scope="col"><?= $this->Paginator->sort('custo_estimado','Custo Estimado') ?></th>
                            <th style="vertical-align:top" scope="col"><?= h('Notas Cadastradas') ?></th>
                            <th style="vertical-align:top" scope="col"><?= h('Recibos Emitidos') ?></th>
                            <th style="vertical-align:top" scope="col" class="actions"><?= __('Actions','Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($projetos->count() > 0): ?>
                            <?php foreach ($projetos as $projeto): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($projeto->id) ?></th>
                                    <td><?= h($projeto->descricao) ?></td>
                                    <td><?= $projeto->has('cliente') ? $this->Html->link($projeto->cliente->pessoa->nome, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) : '' ?></td>
                                    <td><?= $projeto->has('projeto_situacao') ? h($projeto->projeto_situacao->descricao):'' ?></td>
                                    <td><?= $projeto->has('equipe')?h($projeto->equipe->descricao):'-' ?></td>
                                    <td><?= $projeto->custoEstimado(true) ?></td>
                                    <td><?= $projeto->totalNotas(true) ?></td>
                                    <td><?= $projeto->totalRecibos(true) ?></td>

                                    <td class="actions">
                                        <?= $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $projeto->id],['Title'=>'Visualizar detalhes do Projeto','escape'=>false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $projeto->id],['Title'=>'Alterar Projeto','escape'=>false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-file-invoice-dollar"></i>',
                                            ['controller' => 'Orcamentos', 'action' => 'add', $projeto->id], [
                                                'id' => 'addOrcamento',
                                                'class' => 'modal_xl_link',
                                                'style'=>'top:2.5em',
                                                'role' => 'button',
                                                'data-toggle'=>"modal",
                                                'data-target'=>".modal_econstruct",
                                                'title'=>'Novo Orçamento',
                                                'escape' => false
                                            ]) ?>
                                        <?php if(is_null($projeto->contrato_id)): ?>
                                            <?= $this->Html->link('<i class="fas fa-file-alt"></i>',
                                                ['controller'=>'Contratos','action' => 'add', $projeto->id], [
                                                    'id' => 'addContrato',
                                                    'class' => 'modal_xl_link',
                                                    'style'=>'top:2.5em',
                                                    'role' => 'button',
                                                    'data-toggle'=>"modal",
                                                    'data-target'=>".modal_econstruct",
                                                    'Title'=>'Gerar Contrato',
                                                    'escape' => false
                                                ]) ?>
                                        <?php else: ?>
                                            <?= $this->Html->link('<i class="fas fa-file-alt"></i>',
                                                ['controller'=>'Contratos','action' => 'view', $projeto->id], [
                                                    'id' => 'viewContrato',
                                                    'class' => 'modal_xl_link',
                                                    'style'=>'top:2.5em',
                                                    'role' => 'button',
                                                    'data-toggle'=>"modal",
                                                    'data-target'=>".modal_econstruct",
                                                    'Title'=>'Visualizar Contrato',
                                                    'escape' => false
                                                ]) ?>
                                        <?php endif; ?>
                                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $projeto->id],['data'=>['id'=>$projeto->id],'confirm' => __('Deseja realmente excluir o projeto {0}?', $projeto->id),'Title'=>'Excluir Projeto','escape'=>false]) ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="4" scope="row"><?= __('Não há projetos cadastrados.') ?></th>
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
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} projeto(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>