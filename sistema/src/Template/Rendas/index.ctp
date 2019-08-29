<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda[]|\Cake\Collection\CollectionInterface $rendas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Renda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rendas index large-9 medium-8 columns content">
    <h3><?= __('Rendas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fonte_pagadora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf_cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('renda_bruta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('renda_liquida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rendas as $renda): ?>
            <tr>
                <td><?= $this->Number->format($renda->id) ?></td>
                <td><?= h($renda->fonte_pagadora) ?></td>
                <td><?= h($renda->tipo) ?></td>
                <td><?= h($renda->cpf_cnpj) ?></td>
                <td><?= $this->Number->format($renda->renda_bruta) ?></td>
                <td><?= $this->Number->format($renda->renda_liquida) ?></td>
                <td><?= $renda->has('pessoa') ? $this->Html->link($renda->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $renda->pessoa->id]) : '' ?></td>
                <td><?= h($renda->created) ?></td>
                <td><?= h($renda->modified) ?></td>
                <td><?= $this->Number->format($renda->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $renda->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $renda->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $renda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renda->id)]) ?>
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
