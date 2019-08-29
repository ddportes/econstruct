<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Papel $papel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Papeis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Papeis'), ['controller' => 'UserPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Papel'), ['controller' => 'UserPapeis', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="papeis form large-9 medium-8 columns content">
    <?= $this->Form->create($papel) ?>
    <fieldset>
        <legend><?= __('Add Papel') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('papel_pai_id');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
