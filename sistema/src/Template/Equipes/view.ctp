<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipe $equipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipe'), ['action' => 'edit', $equipe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipe'), ['action' => 'delete', $equipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipes view large-9 medium-8 columns content">
    <h3><?= h($equipe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $equipe->has('projeto') ? $this->Html->link($equipe->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $equipe->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($equipe->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($equipe->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($equipe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($equipe->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Equipe Pedreiros') ?></h4>
        <?php if (!empty($equipe->equipe_pedreiros)): ?>
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
            <?php foreach ($equipe->equipe_pedreiros as $equipePedreiros): ?>
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
    <div class="related">
        <h4><?= __('Related Recibos') ?></h4>
        <?php if (!empty($equipe->recibos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Equipe Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($equipe->recibos as $recibos): ?>
            <tr>
                <td><?= h($recibos->id) ?></td>
                <td><?= h($recibos->equipe_id) ?></td>
                <td><?= h($recibos->projeto_id) ?></td>
                <td><?= h($recibos->valor) ?></td>
                <td><?= h($recibos->data) ?></td>
                <td><?= h($recibos->created) ?></td>
                <td><?= h($recibos->modified) ?></td>
                <td><?= h($recibos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recibos', 'action' => 'view', $recibos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recibos', 'action' => 'edit', $recibos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recibos', 'action' => 'delete', $recibos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
