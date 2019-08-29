<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recibo[]|\Cake\Collection\CollectionInterface $recibos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recibo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recibos index large-9 medium-8 columns content">
    <h3><?= __('Recibos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('equipe_id') ?></th>
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
            <?php foreach ($recibos as $recibo): ?>
            <tr>
                <td><?= $this->Number->format($recibo->id) ?></td>
                <td><?= $recibo->has('equipe') ? $this->Html->link($recibo->equipe->id, ['controller' => 'Equipes', 'action' => 'view', $recibo->equipe->id]) : '' ?></td>
                <td><?= $recibo->has('projeto') ? $this->Html->link($recibo->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $recibo->projeto->id]) : '' ?></td>
                <td><?= $this->Number->format($recibo->valor) ?></td>
                <td><?= h($recibo->data) ?></td>
                <td><?= h($recibo->created) ?></td>
                <td><?= h($recibo->modified) ?></td>
                <td><?= $this->Number->format($recibo->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recibo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recibo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recibo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibo->id)]) ?>
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
