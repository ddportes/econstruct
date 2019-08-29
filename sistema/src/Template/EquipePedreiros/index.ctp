<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipePedreiro[]|\Cake\Collection\CollectionInterface $equipePedreiros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipePedreiros index large-9 medium-8 columns content">
    <h3><?= __('Equipe Pedreiros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('equipe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedreiro_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipePedreiros as $equipePedreiro): ?>
            <tr>
                <td><?= $this->Number->format($equipePedreiro->id) ?></td>
                <td><?= $equipePedreiro->has('equipe') ? $this->Html->link($equipePedreiro->equipe->id, ['controller' => 'Equipes', 'action' => 'view', $equipePedreiro->equipe->id]) : '' ?></td>
                <td><?= $equipePedreiro->has('pedreiro') ? $this->Html->link($equipePedreiro->pedreiro->id, ['controller' => 'Pedreiros', 'action' => 'view', $equipePedreiro->pedreiro->id]) : '' ?></td>
                <td><?= h($equipePedreiro->created) ?></td>
                <td><?= h($equipePedreiro->modified) ?></td>
                <td><?= $this->Number->format($equipePedreiro->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipePedreiro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipePedreiro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipePedreiro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipePedreiro->id)]) ?>
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
