<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissaoPapel[]|\Cake\Collection\CollectionInterface $permissaoPapeis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissoes'), ['controller' => 'Permissoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao'), ['controller' => 'Permissoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissaoPapeis index large-9 medium-8 columns content">
    <h3><?= __('Permissao Papeis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permissao_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('papel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissaoPapeis as $permissaoPapel): ?>
            <tr>
                <td><?= $this->Number->format($permissaoPapel->id) ?></td>
                <td><?= $permissaoPapel->has('permissao') ? $this->Html->link($permissaoPapel->permissao->id, ['controller' => 'Permissoes', 'action' => 'view', $permissaoPapel->permissao->id]) : '' ?></td>
                <td><?= $permissaoPapel->has('papel') ? $this->Html->link($permissaoPapel->papel->id, ['controller' => 'Papeis', 'action' => 'view', $permissaoPapel->papel->id]) : '' ?></td>
                <td><?= h($permissaoPapel->created) ?></td>
                <td><?= h($permissaoPapel->modified) ?></td>
                <td><?= $this->Number->format($permissaoPapel->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permissaoPapel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissaoPapel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissaoPapel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissaoPapel->id)]) ?>
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
