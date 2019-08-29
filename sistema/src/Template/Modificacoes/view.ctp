<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modificacao $modificacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modificacao'), ['action' => 'edit', $modificacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modificacao'), ['action' => 'delete', $modificacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modificacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modificacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modificacao'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modificacoes view large-9 medium-8 columns content">
    <h3><?= h($modificacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $modificacao->has('empresa') ? $this->Html->link($modificacao->empresa->nome_fantasia, ['controller' => 'Empresas', 'action' => 'view', $modificacao->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($modificacao->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($modificacao->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modificacao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($modificacao->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datahora') ?></th>
            <td><?= h($modificacao->datahora) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Dados Originais') ?></h4>
        <?= $this->Text->autoParagraph(h($modificacao->dados_originais)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dados Novos') ?></h4>
        <?= $this->Text->autoParagraph(h($modificacao->dados_novos)); ?>
    </div>
</div>
