<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissao $permissao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permissao'), ['action' => 'edit', $permissao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permissao'), ['action' => 'delete', $permissao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissoes view large-9 medium-8 columns content">
    <h3><?= h($permissao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($permissao->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permissao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permissao Pai Id') ?></th>
            <td><?= $this->Number->format($permissao->permissao_pai_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($permissao->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($permissao->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($permissao->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permissao Papeis') ?></h4>
        <?php if (!empty($permissao->permissao_papeis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Permissao Id') ?></th>
                <th scope="col"><?= __('Papel Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permissao->permissao_papeis as $permissaoPapeis): ?>
            <tr>
                <td><?= h($permissaoPapeis->id) ?></td>
                <td><?= h($permissaoPapeis->permissao_id) ?></td>
                <td><?= h($permissaoPapeis->papel_id) ?></td>
                <td><?= h($permissaoPapeis->created) ?></td>
                <td><?= h($permissaoPapeis->modified) ?></td>
                <td><?= h($permissaoPapeis->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PermissaoPapeis', 'action' => 'view', $permissaoPapeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PermissaoPapeis', 'action' => 'edit', $permissaoPapeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PermissaoPapeis', 'action' => 'delete', $permissaoPapeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissaoPapeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
