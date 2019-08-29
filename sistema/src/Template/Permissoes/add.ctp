<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissao $permissao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Permissoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissoes form large-9 medium-8 columns content">
    <?= $this->Form->create($permissao) ?>
    <fieldset>
        <legend><?= __('Add Permissao') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('permissao_pai_id');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
