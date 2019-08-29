<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedreiro[]|\Cake\Collection\CollectionInterface $pedreiros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['controller' => 'PedreiroSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['controller' => 'PedreiroSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedreiros index large-9 medium-8 columns content">
    <h3><?= __('Pedreiros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedreiro_situacao_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedreiros as $pedreiro): ?>
            <tr>
                <td><?= $this->Number->format($pedreiro->id) ?></td>
                <td><?= $pedreiro->has('pessoa') ? $this->Html->link($pedreiro->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pedreiro->pessoa->id]) : '' ?></td>
                <td><?= $pedreiro->has('pedreiro_situacao') ? $this->Html->link($pedreiro->pedreiro_situacao->id, ['controller' => 'PedreiroSituacoes', 'action' => 'view', $pedreiro->pedreiro_situacao->id]) : '' ?></td>
                <td><?= h($pedreiro->created) ?></td>
                <td><?= h($pedreiro->modified) ?></td>
                <td><?= $this->Number->format($pedreiro->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedreiro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedreiro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedreiro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiro->id)]) ?>
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
