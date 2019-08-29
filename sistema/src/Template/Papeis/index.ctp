<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Papel[]|\Cake\Collection\CollectionInterface $papeis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Papel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Papeis'), ['controller' => 'UserPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Papel'), ['controller' => 'UserPapeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="papeis index large-9 medium-8 columns content">
    <h3><?= __('Papeis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('papel_pai_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($papeis as $papel): ?>
            <tr>
                <td><?= $this->Number->format($papel->id) ?></td>
                <td><?= h($papel->descricao) ?></td>
                <td><?= $this->Number->format($papel->papel_pai_id) ?></td>
                <td><?= $this->Number->format($papel->empresa_id) ?></td>
                <td><?= h($papel->created) ?></td>
                <td><?= h($papel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $papel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $papel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $papel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $papel->id)]) ?>
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
