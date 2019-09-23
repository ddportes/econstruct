<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contrato'), ['action' => 'edit', $contrato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contrato'), ['action' => 'delete', $contrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contratos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contrato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contratos view large-9 medium-8 columns content">
    <h3><?= h($contrato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $contrato->has('projeto') ? $this->Html->link($contrato->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $contrato->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orcamento') ?></th>
            <td><?= $contrato->has('orcamento') ? $this->Html->link($contrato->orcamento->id, ['controller' => 'Orcamentos', 'action' => 'view', $contrato->orcamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $contrato->has('empresa') ? $this->Html->link($contrato->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $contrato->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contrato->has('user') ? $this->Html->link($contrato->user->username, ['controller' => 'Users', 'action' => 'view', $contrato->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contrato->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Assinatura') ?></th>
            <td><?= $this->Number->format($contrato->data_assinatura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicial') ?></th>
            <td><?= h($contrato->data_inicial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Final') ?></th>
            <td><?= h($contrato->data_final) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contrato->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contrato->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Minuta') ?></h4>
        <?= $this->Text->autoParagraph(h($contrato->minuta)); ?>
    </div>
</div>
