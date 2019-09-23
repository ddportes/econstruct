<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Itens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notas'), ['controller' => 'Notas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota'), ['controller' => 'Notas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itens view large-9 medium-8 columns content">
    <h3><?= h($item->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nota') ?></th>
            <td><?= $item->has('nota') ? $this->Html->link($item->nota->id, ['controller' => 'Notas', 'action' => 'view', $item->nota->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $item->has('produto') ? $this->Html->link($item->produto->id, ['controller' => 'Produtos', 'action' => 'view', $item->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $item->has('empresa') ? $this->Html->link($item->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $item->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $item->has('user') ? $this->Html->link($item->user->username, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($item->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desconto Valor') ?></th>
            <td><?= $this->Number->format($item->desconto_valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desconto Percentual') ?></th>
            <td><?= $this->Number->format($item->desconto_percentual) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($item->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($item->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($item->observacao)); ?>
    </div>
</div>
