<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nota->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Notas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notas form large-9 medium-8 columns content">
    <?= $this->Form->create($nota) ?>
    <fieldset>
        <legend><?= __('Edit Nota') ?></legend>
        <?php
            echo $this->Form->control('projeto_id', ['options' => $projetos, 'empty' => true]);
            echo $this->Form->control('data');
            echo $this->Form->control('valor');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
