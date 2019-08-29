<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedreiro $pedreiro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedreiro'), ['action' => 'edit', $pedreiro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedreiro'), ['action' => 'delete', $pedreiro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['controller' => 'PedreiroSituacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['controller' => 'PedreiroSituacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedreiros view large-9 medium-8 columns content">
    <h3><?= h($pedreiro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pessoa') ?></th>
            <td><?= $pedreiro->has('pessoa') ? $this->Html->link($pedreiro->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pedreiro->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedreiro Situacao') ?></th>
            <td><?= $pedreiro->has('pedreiro_situacao') ? $this->Html->link($pedreiro->pedreiro_situacao->id, ['controller' => 'PedreiroSituacoes', 'action' => 'view', $pedreiro->pedreiro_situacao->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedreiro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($pedreiro->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pedreiro->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pedreiro->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($pedreiro->observacao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipe Pedreiros') ?></h4>
        <?php if (!empty($pedreiro->equipe_pedreiros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Equipe Id') ?></th>
                <th scope="col"><?= __('Pedreiro Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedreiro->equipe_pedreiros as $equipePedreiros): ?>
            <tr>
                <td><?= h($equipePedreiros->id) ?></td>
                <td><?= h($equipePedreiros->equipe_id) ?></td>
                <td><?= h($equipePedreiros->pedreiro_id) ?></td>
                <td><?= h($equipePedreiros->created) ?></td>
                <td><?= h($equipePedreiros->modified) ?></td>
                <td><?= h($equipePedreiros->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EquipePedreiros', 'action' => 'view', $equipePedreiros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipePedreiros', 'action' => 'edit', $equipePedreiros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipePedreiros', 'action' => 'delete', $equipePedreiros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipePedreiros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
