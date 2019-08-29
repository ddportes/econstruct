<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produto Tipos'), ['controller' => 'ProdutoTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto Tipo'), ['controller' => 'ProdutoTipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto Pai') ?></th>
            <td><?= $produto->has('produto') ? $this->Html->link($produto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produto->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto Tipo') ?></th>
            <td><?= $produto->has('produto_tipo') ? $this->Html->link($produto->produto_tipo->id, ['controller' => 'ProdutoTipos', 'action' => 'view', $produto->produto_tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Itens') ?></h4>
        <?php if (!empty($produto->itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nota Id') ?></th>
                <th scope="col"><?= __('Fornecedor Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Desconto Valor') ?></th>
                <th scope="col"><?= __('Desconto Percentual') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->itens as $itens): ?>
            <tr>
                <td><?= h($itens->id) ?></td>
                <td><?= h($itens->nota_id) ?></td>
                <td><?= h($itens->fornecedor_id) ?></td>
                <td><?= h($itens->produto_id) ?></td>
                <td><?= h($itens->observacao) ?></td>
                <td><?= h($itens->valor) ?></td>
                <td><?= h($itens->desconto_valor) ?></td>
                <td><?= h($itens->desconto_percentual) ?></td>
                <td><?= h($itens->created) ?></td>
                <td><?= h($itens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Itens', 'action' => 'view', $itens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Itens', 'action' => 'edit', $itens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itens', 'action' => 'delete', $itens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
