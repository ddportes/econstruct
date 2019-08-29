<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedreiroSituacao $pedreiroSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedreiro Situacao'), ['action' => 'edit', $pedreiroSituacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedreiro Situacao'), ['action' => 'delete', $pedreiroSituacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiroSituacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedreiroSituacoes view large-9 medium-8 columns content">
    <h3><?= h($pedreiroSituacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($pedreiroSituacao->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedreiroSituacao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($pedreiroSituacao->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pedreiroSituacao->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pedreiroSituacao->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pedreiros') ?></h4>
        <?php if (!empty($pedreiroSituacao->pedreiros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Pedreiro Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedreiroSituacao->pedreiros as $pedreiros): ?>
            <tr>
                <td><?= h($pedreiros->id) ?></td>
                <td><?= h($pedreiros->pessoa_id) ?></td>
                <td><?= h($pedreiros->pedreiro_situacao_id) ?></td>
                <td><?= h($pedreiros->observacao) ?></td>
                <td><?= h($pedreiros->created) ?></td>
                <td><?= h($pedreiros->modified) ?></td>
                <td><?= h($pedreiros->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pedreiros', 'action' => 'view', $pedreiros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedreiros', 'action' => 'edit', $pedreiros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedreiros', 'action' => 'delete', $pedreiros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
