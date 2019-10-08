<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa $empresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cliente Situacoes'), ['controller' => 'ClienteSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente Situacao'), ['controller' => 'ClienteSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Configuracoes'), ['controller' => 'Configuracoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Configuracao'), ['controller' => 'Configuracoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dependentes'), ['controller' => 'Dependentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dependente'), ['controller' => 'Dependentes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['controller' => 'FornecedorSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['controller' => 'FornecedorSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modificacoes'), ['controller' => 'Modificacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modificacao'), ['controller' => 'Modificacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notas'), ['controller' => 'Notas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota'), ['controller' => 'Notas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['controller' => 'OcorrenciaTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['controller' => 'OcorrenciaTipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['controller' => 'Ocorrencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['controller' => 'Ocorrencias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['controller' => 'PedreiroSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['controller' => 'PedreiroSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissoes'), ['controller' => 'Permissoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permissao'), ['controller' => 'Permissoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produto Tipos'), ['controller' => 'ProdutoTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto Tipo'), ['controller' => 'ProdutoTipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projeto Situacoes'), ['controller' => 'ProjetoSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto Situacao'), ['controller' => 'ProjetoSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rendas'), ['controller' => 'Rendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renda'), ['controller' => 'Rendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Papeis'), ['controller' => 'UserPapeis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Papel'), ['controller' => 'UserPapeis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Add Empresa') ?></legend>
        <?php
            echo $this->Form->control('tipo');
            echo $this->Form->control('cpf_cnpj');
            echo $this->Form->control('inscricao');
            echo $this->Form->control('razao_social');
            echo $this->Form->control('nome_fantasia');
            echo $this->Form->control('data_inicio', ['empty' => true]);
            echo $this->Form->control('data_fim', ['empty' => true]);
            echo $this->Form->control('mensal');
            echo $this->Form->control('observacao');
            echo $this->Form->control('u_id');
            echo $this->Form->control('endereco_id');
            echo $this->Form->control('representante_id');
            echo $this->Form->control('telefone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
