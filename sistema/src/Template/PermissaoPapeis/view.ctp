<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissaoPapel $permissaoPapel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permissao Papel'), ['action' => 'edit', $permissaoPapel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permissao Papel'), ['action' => 'delete', $permissaoPapel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissaoPapel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissoes'), ['controller' => 'Permissoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao'), ['controller' => 'Permissoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissaoPapeis view large-9 medium-8 columns content">
    <h3><?= h($permissaoPapel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Permissao') ?></th>
            <td><?= $permissaoPapel->has('permissao') ? $this->Html->link($permissaoPapel->permissao->id, ['controller' => 'Permissoes', 'action' => 'view', $permissaoPapel->permissao->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Papel') ?></th>
            <td><?= $permissaoPapel->has('papel') ? $this->Html->link($permissaoPapel->papel->id, ['controller' => 'Papeis', 'action' => 'view', $permissaoPapel->papel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permissaoPapel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($permissaoPapel->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($permissaoPapel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($permissaoPapel->modified) ?></td>
        </tr>
    </table>
</div>
