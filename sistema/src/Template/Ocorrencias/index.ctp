<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ocorrencia[]|\Cake\Collection\CollectionInterface $ocorrencias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['controller' => 'OcorrenciaTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['controller' => 'OcorrenciaTipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ocorrencias index large-9 medium-8 columns content">
    <h3><?= __('Ocorrencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ocorrencia_tipo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_pendencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ocorrencias as $ocorrencia): ?>
            <tr>
                <td><?= $this->Number->format($ocorrencia->id) ?></td>
                <td><?= $ocorrencia->has('ocorrencia_tipo') ? $this->Html->link($ocorrencia->ocorrencia_tipo->id, ['controller' => 'OcorrenciaTipos', 'action' => 'view', $ocorrencia->ocorrencia_tipo->id]) : '' ?></td>
                <td><?= $ocorrencia->has('projeto') ? $this->Html->link($ocorrencia->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $ocorrencia->projeto->id]) : '' ?></td>
                <td><?= h($ocorrencia->data) ?></td>
                <td><?= h($ocorrencia->data_pendencia) ?></td>
                <td><?= h($ocorrencia->created) ?></td>
                <td><?= h($ocorrencia->modified) ?></td>
                <td><?= $this->Number->format($ocorrencia->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ocorrencia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ocorrencia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ocorrencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencia->id)]) ?>
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
