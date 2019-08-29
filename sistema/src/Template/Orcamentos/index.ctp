<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orcamento[]|\Cake\Collection\CollectionInterface $orcamentos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orcamento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcamentos index large-9 medium-8 columns content">
    <h3><?= __('Orcamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('custo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_entrega') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orcamentos as $orcamento): ?>
            <tr>
                <td><?= $this->Number->format($orcamento->id) ?></td>
                <td><?= $orcamento->has('projeto') ? $this->Html->link($orcamento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $orcamento->projeto->id]) : '' ?></td>
                <td><?= $this->Number->format($orcamento->custo) ?></td>
                <td><?= $this->Number->format($orcamento->total) ?></td>
                <td><?= h($orcamento->data_inicial) ?></td>
                <td><?= h($orcamento->data_entrega) ?></td>
                <td><?= h($orcamento->created) ?></td>
                <td><?= h($orcamento->modified) ?></td>
                <td><?= $this->Number->format($orcamento->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orcamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orcamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orcamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orcamento->id)]) ?>
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
