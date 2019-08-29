<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contrato'), ['action' => 'edit', $contrato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contrato'), ['action' => 'delete', $contrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contratos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contrato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contratos view large-9 medium-8 columns content">
    <h3><?= h($contrato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Orcamento') ?></th>
            <td><?= $contrato->has('orcamento') ? $this->Html->link($contrato->orcamento->id, ['controller' => 'Orcamentos', 'action' => 'view', $contrato->orcamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contrato->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projeto Id') ?></th>
            <td><?= $this->Number->format($contrato->projeto_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Assinatura') ?></th>
            <td><?= $this->Number->format($contrato->data_assinatura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($contrato->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicial') ?></th>
            <td><?= h($contrato->data_inicial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Final') ?></th>
            <td><?= h($contrato->data_final) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contrato->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contrato->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($contrato->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Detalhes') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Pasta Projeto') ?></th>
                <th scope="col"><?= __('Projeto Situacao Id') ?></th>
                <th scope="col"><?= __('Contrato Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Orcamento') ?></th>
                <th scope="col"><?= __('Custo Estimado') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contrato->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->descricao) ?></td>
                <td><?= h($projetos->detalhes) ?></td>
                <td><?= h($projetos->cliente_id) ?></td>
                <td><?= h($projetos->pasta_projeto) ?></td>
                <td><?= h($projetos->projeto_situacao_id) ?></td>
                <td><?= h($projetos->contrato_id) ?></td>
                <td><?= h($projetos->created) ?></td>
                <td><?= h($projetos->modified) ?></td>
                <td><?= h($projetos->orcamento) ?></td>
                <td><?= h($projetos->custo_estimado) ?></td>
                <td><?= h($projetos->observacao) ?></td>
                <td><?= h($projetos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
