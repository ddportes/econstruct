<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recebimento $recebimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recebimento'), ['action' => 'edit', $recebimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recebimento'), ['action' => 'delete', $recebimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recebimentos view large-9 medium-8 columns content">
    <h3><?= h($recebimento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $recebimento->has('projeto') ? $this->Html->link($recebimento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $recebimento->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recebimento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($recebimento->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($recebimento->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($recebimento->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($recebimento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($recebimento->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($recebimento->observacao)); ?>
    </div>
</div>
