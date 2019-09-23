<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato[]|\Cake\Collection\CollectionInterface $contratos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contrato'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contratos index large-9 medium-8 columns content">
    <h3><?= __('Contratos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orcamento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_assinatura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_inicial') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_final') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('u_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratos as $contrato): ?>
            <tr>
                <td><?= $this->Number->format($contrato->id) ?></td>
                <td><?= $contrato->has('projeto') ? $this->Html->link($contrato->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $contrato->projeto->id]) : '' ?></td>
                <td><?= $contrato->has('orcamento') ? $this->Html->link($contrato->orcamento->id, ['controller' => 'Orcamentos', 'action' => 'view', $contrato->orcamento->id]) : '' ?></td>
                <td><?= $this->Number->format($contrato->data_assinatura) ?></td>
                <td><?= h($contrato->data_inicial) ?></td>
                <td><?= h($contrato->data_final) ?></td>
                <td><?= h($contrato->created) ?></td>
                <td><?= h($contrato->modified) ?></td>
                <td><?= $contrato->has('empresa') ? $this->Html->link($contrato->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $contrato->empresa->id]) : '' ?></td>
                <td><?= $contrato->has('user') ? $this->Html->link($contrato->user->username, ['controller' => 'Users', 'action' => 'view', $contrato->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contrato->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contrato->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
