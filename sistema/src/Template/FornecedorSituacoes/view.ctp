<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FornecedorSituacao $fornecedorSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fornecedor Situacao'), ['action' => 'edit', $fornecedorSituacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fornecedor Situacao'), ['action' => 'delete', $fornecedorSituacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedorSituacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fornecedorSituacoes view large-9 medium-8 columns content">
    <h3><?= h($fornecedorSituacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($fornecedorSituacao->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fornecedorSituacao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($fornecedorSituacao->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fornecedorSituacao->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fornecedorSituacao->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fornecedores') ?></h4>
        <?php if (!empty($fornecedorSituacao->fornecedores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fornecedor Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fornecedorSituacao->fornecedores as $fornecedores): ?>
            <tr>
                <td><?= h($fornecedores->id) ?></td>
                <td><?= h($fornecedores->fornecedor_situacao_id) ?></td>
                <td><?= h($fornecedores->observacao) ?></td>
                <td><?= h($fornecedores->pessoa_id) ?></td>
                <td><?= h($fornecedores->created) ?></td>
                <td><?= h($fornecedores->modified) ?></td>
                <td><?= h($fornecedores->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fornecedores', 'action' => 'view', $fornecedores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fornecedores', 'action' => 'edit', $fornecedores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fornecedores', 'action' => 'delete', $fornecedores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
