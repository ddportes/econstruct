<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependente $dependente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dependente'), ['action' => 'edit', $dependente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dependente'), ['action' => 'delete', $dependente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dependente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dependentes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dependente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dependentes view large-9 medium-8 columns content">
    <h3><?= h($dependente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $dependente->has('pessoa') ? $this->Html->link($dependente->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $dependente->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $dependente->has('empresa') ? $this->Html->link($dependente->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $dependente->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dependente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pai Mae Id') ?></th>
            <td><?= $this->Number->format($dependente->pai_mae_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('U Id') ?></th>
            <td><?= $this->Number->format($dependente->u_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dependente->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dependente->modified) ?></td>
        </tr>
    </table>
</div>
