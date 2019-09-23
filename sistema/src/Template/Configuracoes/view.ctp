<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuracao $configuracao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Configuracao'), ['action' => 'edit', $configuracao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Configuracao'), ['action' => 'delete', $configuracao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuracao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Configuracoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Configuracao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="configuracoes view large-9 medium-8 columns content">
    <h3><?= h($configuracao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $configuracao->has('empresa') ? $this->Html->link($configuracao->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $configuracao->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($configuracao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('U Id') ?></th>
            <td><?= $this->Number->format($configuracao->u_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($configuracao->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($configuracao->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Minuta Default') ?></h4>
        <?= $this->Text->autoParagraph(h($configuracao->minuta_default)); ?>
    </div>
</div>
