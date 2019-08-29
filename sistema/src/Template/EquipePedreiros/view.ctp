<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipePedreiro $equipePedreiro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipe Pedreiro'), ['action' => 'edit', $equipePedreiro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipe Pedreiro'), ['action' => 'delete', $equipePedreiro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipePedreiro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipePedreiros view large-9 medium-8 columns content">
    <h3><?= h($equipePedreiro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Equipe') ?></th>
            <td><?= $equipePedreiro->has('equipe') ? $this->Html->link($equipePedreiro->equipe->id, ['controller' => 'Equipes', 'action' => 'view', $equipePedreiro->equipe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedreiro') ?></th>
            <td><?= $equipePedreiro->has('pedreiro') ? $this->Html->link($equipePedreiro->pedreiro->id, ['controller' => 'Pedreiros', 'action' => 'view', $equipePedreiro->pedreiro->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipePedreiro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($equipePedreiro->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($equipePedreiro->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($equipePedreiro->modified) ?></td>
        </tr>
    </table>
</div>
