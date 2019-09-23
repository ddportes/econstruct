<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $itens
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notas'), ['controller' => 'Notas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota'), ['controller' => 'Notas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itens index large-9 medium-8 columns content">
    <h3><?= __('Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nota_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desconto_valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desconto_percentual') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('u_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itens as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= $item->has('nota') ? $this->Html->link($item->nota->id, ['controller' => 'Notas', 'action' => 'view', $item->nota->id]) : '' ?></td>
                <td><?= $item->has('produto') ? $this->Html->link($item->produto->id, ['controller' => 'Produtos', 'action' => 'view', $item->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($item->valor) ?></td>
                <td><?= $this->Number->format($item->desconto_valor) ?></td>
                <td><?= $this->Number->format($item->desconto_percentual) ?></td>
                <td><?= h($item->created) ?></td>
                <td><?= h($item->modified) ?></td>
                <td><?= $item->has('empresa') ? $this->Html->link($item->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $item->empresa->id]) : '' ?></td>
                <td><?= $item->has('user') ? $this->Html->link($item->user->username, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
