<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa[]|\Cake\Collection\CollectionInterface $pessoas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rendas'), ['controller' => 'Rendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renda'), ['controller' => 'Rendas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_civil') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conjuge_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filhos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf_cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= $this->Number->format($pessoa->id) ?></td>
                <td><?= h($pessoa->nome) ?></td>
                <td><?= h($pessoa->nome_social) ?></td>
                <td><?= $this->Number->format($pessoa->estado_civil) ?></td>
                <td><?= $this->Number->format($pessoa->conjuge_id) ?></td>
                <td><?= $this->Number->format($pessoa->filhos) ?></td>
                <td><?= h($pessoa->sexo) ?></td>
                <td><?= h($pessoa->tipo) ?></td>
                <td><?= h($pessoa->cpf_cnpj) ?></td>
                <td><?= h($pessoa->rg) ?></td>
                <td><?= h($pessoa->created) ?></td>
                <td><?= h($pessoa->modified) ?></td>
                <td><?= $this->Number->format($pessoa->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?>
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
