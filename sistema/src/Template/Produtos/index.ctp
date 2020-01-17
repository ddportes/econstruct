<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-cart icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Produtos.
                <div class="page-title-subheading">
                    <p>Listagem de todos os produtos cadastrados.</p>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button"  onclick="$('#menu-acoes').toggle()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Ações
                </button>
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Produto').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Produto','class'=>'nav-link','escape'=>false]) ?>
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
            <div class="card-body"><h5 class="card-title">Produtos Cadastrados</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Produto Pai','Produto Pai') ?></th>
                            <th scope="col"><?= __('Descrição') ?></th>
                            <th scope="col"><?= __('Tipo de Produto') ?></th>
                            <th scope="col" class="actions"><?= __('Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($produtos->count() > 0): ?>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($produto->id) ?></th>
                                    <td><?= $produto->has('produto_pai') ? $this->Html->link($produto->produto_pai->descricao, ['controller' => 'Produtos', 'action' => 'view', $produto->produto_pai->id]) : '' ?></td>
                                    <td><?= $produto->descricao ?></td>
                                    <td><?= $produto->produto_tipo->descricao ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $produto->id],['Title'=>'Visualizar detalhes do produto','escape'=>false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $produto->id],['Title'=>'Alterar produto','escape'=>false]) ?>
                                        <?php echo $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $produto->id],['data'=>['id'=>$produto->id],'confirm' => __('Deseja realmente excluir o produto {0}?', $produto->id),'Title'=>'Excluir produto','escape'=>false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="4" scope="row"><?= __('Não há produtos cadastrados.') ?></th>
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
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} produto(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>