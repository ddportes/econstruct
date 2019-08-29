<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciaTipo[]|\Cake\Collection\CollectionInterface $ocorrenciaTipos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['controller' => 'Ocorrencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['controller' => 'Ocorrencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ocorrenciaTipos index large-9 medium-8 columns content">
    <h3><?= __('Ocorrencia Tipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ocorrenciaTipos as $ocorrenciaTipo): ?>
            <tr>
                <td><?= $this->Number->format($ocorrenciaTipo->id) ?></td>
                <td><?= h($ocorrenciaTipo->descricao) ?></td>
                <td><?= h($ocorrenciaTipo->created) ?></td>
                <td><?= h($ocorrenciaTipo->modified) ?></td>
                <td><?= $this->Number->format($ocorrenciaTipo->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ocorrenciaTipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ocorrenciaTipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ocorrenciaTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaTipo->id)]) ?>
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
