<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClienteSituacao[]|\Cake\Collection\CollectionInterface $clienteSituacoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente Situacao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clienteSituacoes index large-9 medium-8 columns content">
    <h3><?= __('Cliente Situacoes') ?></h3>
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
            <?php foreach ($clienteSituacoes as $clienteSituacao): ?>
            <tr>
                <td><?= $this->Number->format($clienteSituacao->id) ?></td>
                <td><?= h($clienteSituacao->descricao) ?></td>
                <td><?= h($clienteSituacao->created) ?></td>
                <td><?= h($clienteSituacao->modified) ?></td>
                <td><?= $this->Number->format($clienteSituacao->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clienteSituacao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clienteSituacao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clienteSituacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clienteSituacao->id)]) ?>
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
