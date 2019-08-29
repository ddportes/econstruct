<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recibo $recibo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recibo'), ['action' => 'edit', $recibo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recibo'), ['action' => 'delete', $recibo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recibos view large-9 medium-8 columns content">
    <h3><?= h($recibo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipe') ?></th>
            <td><?= $recibo->has('equipe') ? $this->Html->link($recibo->equipe->id, ['controller' => 'Equipes', 'action' => 'view', $recibo->equipe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $recibo->has('projeto') ? $this->Html->link($recibo->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $recibo->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recibo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($recibo->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($recibo->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($recibo->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($recibo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($recibo->modified) ?></td>
        </tr>
    </table>
</div>
