<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciaTipo $ocorrenciaTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ocorrencia Tipo'), ['action' => 'edit', $ocorrenciaTipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ocorrencia Tipo'), ['action' => 'delete', $ocorrenciaTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaTipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['controller' => 'Ocorrencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['controller' => 'Ocorrencias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ocorrenciaTipos view large-9 medium-8 columns content">
    <h3><?= h($ocorrenciaTipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($ocorrenciaTipo->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ocorrenciaTipo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($ocorrenciaTipo->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ocorrenciaTipo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ocorrenciaTipo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ocorrencias') ?></h4>
        <?php if (!empty($ocorrenciaTipo->ocorrencias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ocorrencia Tipo Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ocorrenciaTipo->ocorrencias as $ocorrencias): ?>
            <tr>
                <td><?= h($ocorrencias->id) ?></td>
                <td><?= h($ocorrencias->ocorrencia_tipo_id) ?></td>
                <td><?= h($ocorrencias->projeto_id) ?></td>
                <td><?= h($ocorrencias->observacao) ?></td>
                <td><?= h($ocorrencias->data) ?></td>
                <td><?= h($ocorrencias->created) ?></td>
                <td><?= h($ocorrencias->modified) ?></td>
                <td><?= h($ocorrencias->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ocorrencias', 'action' => 'view', $ocorrencias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ocorrencias', 'action' => 'edit', $ocorrencias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ocorrencias', 'action' => 'delete', $ocorrencias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
