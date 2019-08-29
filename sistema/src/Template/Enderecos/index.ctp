<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco[]|\Cake\Collection\CollectionInterface $enderecos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enderecos index large-9 medium-8 columns content">
    <h3><?= __('Enderecos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logradouro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('principal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enderecos as $endereco): ?>
            <tr>
                <td><?= $this->Number->format($endereco->id) ?></td>
                <td><?= $endereco->has('pessoa') ? $this->Html->link($endereco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $endereco->pessoa->id]) : '' ?></td>
                <td><?= h($endereco->logradouro) ?></td>
                <td><?= $this->Number->format($endereco->numero) ?></td>
                <td><?= h($endereco->complemento) ?></td>
                <td><?= h($endereco->bairro) ?></td>
                <td><?= $this->Number->format($endereco->cep) ?></td>
                <td><?= $this->Number->format($endereco->cidade_id) ?></td>
                <td><?= h($endereco->principal) ?></td>
                <td><?= h($endereco->created) ?></td>
                <td><?= h($endereco->modified) ?></td>
                <td><?= $this->Number->format($endereco->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $endereco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $endereco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $endereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id)]) ?>
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
