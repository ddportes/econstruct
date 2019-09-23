<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota'), ['action' => 'edit', $nota->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota'), ['action' => 'delete', $nota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notas view large-9 medium-8 columns content">
    <h3><?= h($nota->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $nota->has('projeto') ? $this->Html->link($nota->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $nota->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $nota->has('empresa') ? $this->Html->link($nota->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $nota->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nota->has('user') ? $this->Html->link($nota->user->username, ['controller' => 'Users', 'action' => 'view', $nota->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nota->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($nota->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fornecedor Id') ?></th>
            <td><?= $this->Number->format($nota->fornecedor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($nota->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nota->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($nota->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Itens') ?></h4>
        <?php if (!empty($nota->itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nota Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Desconto Valor') ?></th>
                <th scope="col"><?= __('Desconto Percentual') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('U Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nota->itens as $itens): ?>
            <tr>
                <td><?= h($itens->id) ?></td>
                <td><?= h($itens->nota_id) ?></td>
                <td><?= h($itens->produto_id) ?></td>
                <td><?= h($itens->observacao) ?></td>
                <td><?= h($itens->valor) ?></td>
                <td><?= h($itens->desconto_valor) ?></td>
                <td><?= h($itens->desconto_percentual) ?></td>
                <td><?= h($itens->created) ?></td>
                <td><?= h($itens->modified) ?></td>
                <td><?= h($itens->empresa_id) ?></td>
                <td><?= h($itens->u_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Itens', 'action' => 'view', $itens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Itens', 'action' => 'edit', $itens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itens', 'action' => 'delete', $itens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
