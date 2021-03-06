<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPapel[]|\Cake\Collection\CollectionInterface $userPapeis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Papel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userPapeis index large-9 medium-8 columns content">
    <h3><?= __('User Papeis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('papel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userPapeis as $userPapel): ?>
            <tr>
                <td><?= $this->Number->format($userPapel->id) ?></td>
                <td><?= $this->Number->format($userPapel->user_id) ?></td>
                <td><?= $userPapel->has('papel') ? $this->Html->link($userPapel->papel->id, ['controller' => 'Papeis', 'action' => 'view', $userPapel->papel->id]) : '' ?></td>
                <td><?= h($userPapel->created) ?></td>
                <td><?= h($userPapel->modified) ?></td>
                <td><?= $this->Number->format($userPapel->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userPapel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userPapel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userPapel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPapel->id)]) ?>
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
