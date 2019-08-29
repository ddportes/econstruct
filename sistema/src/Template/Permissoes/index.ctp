<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissao[]|\Cake\Collection\CollectionInterface $permissoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permissao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissoes index large-9 medium-8 columns content">
    <h3><?= __('Permissoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permissao_pai_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissoes as $permissao): ?>
            <tr>
                <td><?= $this->Number->format($permissao->id) ?></td>
                <td><?= h($permissao->descricao) ?></td>
                <td><?= $this->Number->format($permissao->permissao_pai_id) ?></td>
                <td><?= h($permissao->created) ?></td>
                <td><?= h($permissao->modified) ?></td>
                <td><?= $this->Number->format($permissao->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permissao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissao->id)]) ?>
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
