<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Renda'), ['action' => 'edit', $renda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Renda'), ['action' => 'delete', $renda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renda->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rendas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renda'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rendas view large-9 medium-8 columns content">
    <h3><?= h($renda->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fonte Pagadora') ?></th>
            <td><?= h($renda->fonte_pagadora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($renda->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf Cnpj') ?></th>
            <td><?= h($renda->cpf_cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $renda->has('pessoa') ? $this->Html->link($renda->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $renda->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($renda->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renda Bruta') ?></th>
            <td><?= $this->Number->format($renda->renda_bruta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renda Liquida') ?></th>
            <td><?= $this->Number->format($renda->renda_liquida) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($renda->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($renda->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($renda->modified) ?></td>
        </tr>
    </table>
</div>
