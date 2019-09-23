<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota[]|\Cake\Collection\CollectionInterface $notas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nota'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notas index large-9 medium-8 columns content">
    <h3><?= __('Notas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fornecedor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('u_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas as $nota): ?>
            <tr>
                <td><?= $this->Number->format($nota->id) ?></td>
                <td><?= $nota->has('projeto') ? $this->Html->link($nota->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $nota->projeto->id]) : '' ?></td>
                <td><?= h($nota->data) ?></td>
                <td><?= $this->Number->format($nota->valor) ?></td>
                <td><?= $this->Number->format($nota->fornecedor_id) ?></td>
                <td><?= h($nota->created) ?></td>
                <td><?= h($nota->modified) ?></td>
                <td><?= $nota->has('empresa') ? $this->Html->link($nota->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $nota->empresa->id]) : '' ?></td>
                <td><?= $nota->has('user') ? $this->Html->link($nota->user->username, ['controller' => 'Users', 'action' => 'view', $nota->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nota->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nota->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id)]) ?>
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
