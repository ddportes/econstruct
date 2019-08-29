<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orcamento $orcamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orcamento'), ['action' => 'edit', $orcamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orcamento'), ['action' => 'delete', $orcamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orcamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orcamentos view large-9 medium-8 columns content">
    <h3><?= h($orcamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $orcamento->has('projeto') ? $this->Html->link($orcamento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $orcamento->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orcamento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Custo') ?></th>
            <td><?= $this->Number->format($orcamento->custo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($orcamento->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($orcamento->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicial') ?></th>
            <td><?= h($orcamento->data_inicial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Entrega') ?></th>
            <td><?= h($orcamento->data_entrega) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orcamento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orcamento->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($orcamento->observacao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Contratos') ?></h4>
        <?php if (!empty($orcamento->contratos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Orcamento Id') ?></th>
                <th scope="col"><?= __('Data Assinatura') ?></th>
                <th scope="col"><?= __('Data Inicial') ?></th>
                <th scope="col"><?= __('Data Final') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($orcamento->contratos as $contratos): ?>
            <tr>
                <td><?= h($contratos->id) ?></td>
                <td><?= h($contratos->projeto_id) ?></td>
                <td><?= h($contratos->orcamento_id) ?></td>
                <td><?= h($contratos->data_assinatura) ?></td>
                <td><?= h($contratos->data_inicial) ?></td>
                <td><?= h($contratos->data_final) ?></td>
                <td><?= h($contratos->created) ?></td>
                <td><?= h($contratos->modified) ?></td>
                <td><?= h($contratos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contratos', 'action' => 'view', $contratos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contratos', 'action' => 'edit', $contratos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contratos', 'action' => 'delete', $contratos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
