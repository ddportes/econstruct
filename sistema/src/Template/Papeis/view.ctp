<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Papel $papel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Papel'), ['action' => 'edit', $papel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Papel'), ['action' => 'delete', $papel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $papel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Papeis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Papel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Papeis'), ['controller' => 'UserPapeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Papel'), ['controller' => 'UserPapeis', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="papeis view large-9 medium-8 columns content">
    <h3><?= h($papel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($papel->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($papel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Papel Pai Id') ?></th>
            <td><?= $this->Number->format($papel->papel_pai_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($papel->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($papel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($papel->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permissao Papeis') ?></h4>
        <?php if (!empty($papel->permissao_papeis)): ?>
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
            <?php foreach ($papel->permissao_papeis as $permissaoPapeis): ?>
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
    <div class="related">
        <h4><?= __('Related User Papeis') ?></h4>
        <?php if (!empty($papel->user_papeis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Papel Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($papel->user_papeis as $userPapeis): ?>
            <tr>
                <td><?= h($userPapeis->id) ?></td>
                <td><?= h($userPapeis->user_id) ?></td>
                <td><?= h($userPapeis->papel_id) ?></td>
                <td><?= h($userPapeis->created) ?></td>
                <td><?= h($userPapeis->modified) ?></td>
                <td><?= h($userPapeis->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserPapeis', 'action' => 'view', $userPapeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserPapeis', 'action' => 'edit', $userPapeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserPapeis', 'action' => 'delete', $userPapeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPapeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
