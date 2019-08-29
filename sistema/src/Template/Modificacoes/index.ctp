<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modificacao[]|\Cake\Collection\CollectionInterface $modificacoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modificacao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modificacoes index large-9 medium-8 columns content">
    <h3><?= __('Modificacoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datahora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modificacoes as $modificacao): ?>
            <tr>
                <td><?= $this->Number->format($modificacao->id) ?></td>
                <td><?= h($modificacao->datahora) ?></td>
                <td><?= $this->Number->format($modificacao->user_id) ?></td>
                <td><?= $modificacao->has('empresa') ? $this->Html->link($modificacao->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $modificacao->empresa->id]) : '' ?></td>
                <td><?= h($modificacao->controller) ?></td>
                <td><?= h($modificacao->action) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modificacao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modificacao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modificacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modificacao->id)]) ?>
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
