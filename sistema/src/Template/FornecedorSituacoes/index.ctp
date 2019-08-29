<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FornecedorSituacao[]|\Cake\Collection\CollectionInterface $fornecedorSituacoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedorSituacoes index large-9 medium-8 columns content">
    <h3><?= __('Fornecedor Situacoes') ?></h3>
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
            <?php foreach ($fornecedorSituacoes as $fornecedorSituacao): ?>
            <tr>
                <td><?= $this->Number->format($fornecedorSituacao->id) ?></td>
                <td><?= h($fornecedorSituacao->descricao) ?></td>
                <td><?= h($fornecedorSituacao->created) ?></td>
                <td><?= h($fornecedorSituacao->modified) ?></td>
                <td><?= $this->Number->format($fornecedorSituacao->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedorSituacao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedorSituacao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fornecedorSituacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedorSituacao->id)]) ?>
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
