<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuracao[]|\Cake\Collection\CollectionInterface $configuracoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Configuracao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="configuracoes index large-9 medium-8 columns content">
    <h3><?= __('Configuracoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('u_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configuracoes as $configuracao): ?>
            <tr>
                <td><?= $this->Number->format($configuracao->id) ?></td>
                <td><?= $configuracao->has('empresa') ? $this->Html->link($configuracao->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $configuracao->empresa->id]) : '' ?></td>
                <td><?= $this->Number->format($configuracao->u_id) ?></td>
                <td><?= h($configuracao->created) ?></td>
                <td><?= h($configuracao->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $configuracao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $configuracao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $configuracao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuracao->id)]) ?>
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
