<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recebimento[]|\Cake\Collection\CollectionInterface $recebimentos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentos index large-9 medium-8 columns content">
    <h3><?= __('Recebimentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recebimentos as $recebimento): ?>
            <tr>
                <td><?= $this->Number->format($recebimento->id) ?></td>
                <td><?= $recebimento->has('projeto') ? $this->Html->link($recebimento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $recebimento->projeto->id]) : '' ?></td>
                <td><?= $this->Number->format($recebimento->valor) ?></td>
                <td><?= h($recebimento->data) ?></td>
                <td><?= h($recebimento->created) ?></td>
                <td><?= h($recebimento->modified) ?></td>
                <td><?= $this->Number->format($recebimento->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recebimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recebimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recebimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]) ?>
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
