<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutoTipo[]|\Cake\Collection\CollectionInterface $produtoTipos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produto Tipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtoTipos index large-9 medium-8 columns content">
    <h3><?= __('Produto Tipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtoTipos as $produtoTipo): ?>
            <tr>
                <td><?= $this->Number->format($produtoTipo->id) ?></td>
                <td><?= h($produtoTipo->descricao) ?></td>
                <td><?= h($produtoTipo->created) ?></td>
                <td><?= h($produtoTipo->modified) ?></td>
                <td><?= $this->Number->format($produtoTipo->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtoTipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtoTipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtoTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtoTipo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
