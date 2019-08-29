<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPapel $userPapel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Papel'), ['action' => 'edit', $userPapel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Papel'), ['action' => 'delete', $userPapel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPapel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Papeis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Papel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userPapeis view large-9 medium-8 columns content">
    <h3><?= h($userPapel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Papel') ?></th>
            <td><?= $userPapel->has('papel') ? $this->Html->link($userPapel->papel->id, ['controller' => 'Papeis', 'action' => 'view', $userPapel->papel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userPapel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userPapel->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($userPapel->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userPapel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userPapel->modified) ?></td>
        </tr>
    </table>
</div>
