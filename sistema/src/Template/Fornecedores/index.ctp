<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor[]|\Cake\Collection\CollectionInterface $fornecedores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['controller' => 'FornecedorSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['controller' => 'FornecedorSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedores index large-9 medium-8 columns content">
    <h3><?= __('Fornecedores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fornecedor_situacao_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <td><?= $this->Number->format($fornecedor->id) ?></td>
                <td><?= $fornecedor->has('fornecedor_situacao') ? $this->Html->link($fornecedor->fornecedor_situacao->id, ['controller' => 'FornecedorSituacoes', 'action' => 'view', $fornecedor->fornecedor_situacao->id]) : '' ?></td>
                <td><?= $fornecedor->has('pessoa') ? $this->Html->link($fornecedor->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $fornecedor->pessoa->id]) : '' ?></td>
                <td><?= h($fornecedor->created) ?></td>
                <td><?= h($fornecedor->modified) ?></td>
                <td><?= $this->Number->format($fornecedor->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id)]) ?>
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
