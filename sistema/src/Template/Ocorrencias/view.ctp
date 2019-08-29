<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ocorrencia $ocorrencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ocorrencia'), ['action' => 'edit', $ocorrencia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ocorrencia'), ['action' => 'delete', $ocorrencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['controller' => 'OcorrenciaTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['controller' => 'OcorrenciaTipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ocorrencias view large-9 medium-8 columns content">
    <h3><?= h($ocorrencia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ocorrencia Tipo') ?></th>
            <td><?= $ocorrencia->has('ocorrencia_tipo') ? $this->Html->link($ocorrencia->ocorrencia_tipo->id, ['controller' => 'OcorrenciaTipos', 'action' => 'view', $ocorrencia->ocorrencia_tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $ocorrencia->has('projeto') ? $this->Html->link($ocorrencia->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $ocorrencia->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ocorrencia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($ocorrencia->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($ocorrencia->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Pendencia') ?></th>
            <td><?= h($ocorrencia->data_pendencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ocorrencia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ocorrencia->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($ocorrencia->observacao)); ?>
    </div>
</div>
