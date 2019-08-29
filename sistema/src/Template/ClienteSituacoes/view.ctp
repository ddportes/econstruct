<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClienteSituacao $clienteSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente Situacao'), ['action' => 'edit', $clienteSituacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente Situacao'), ['action' => 'delete', $clienteSituacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clienteSituacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cliente Situacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente Situacao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clienteSituacoes view large-9 medium-8 columns content">
    <h3><?= h($clienteSituacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($clienteSituacao->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clienteSituacao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($clienteSituacao->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clienteSituacao->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($clienteSituacao->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clientes') ?></h4>
        <?php if (!empty($clienteSituacao->clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Cliente Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clienteSituacao->clientes as $clientes): ?>
            <tr>
                <td><?= h($clientes->id) ?></td>
                <td><?= h($clientes->pessoa_id) ?></td>
                <td><?= h($clientes->cliente_situacao_id) ?></td>
                <td><?= h($clientes->observacao) ?></td>
                <td><?= h($clientes->created) ?></td>
                <td><?= h($clientes->modified) ?></td>
                <td><?= h($clientes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $clientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clientes', 'action' => 'edit', $clientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientes', 'action' => 'delete', $clientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
