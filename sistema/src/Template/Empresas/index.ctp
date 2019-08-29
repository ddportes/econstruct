<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa[]|\Cake\Collection\CollectionInterface $empresas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cliente Situacoes'), ['controller' => 'ClienteSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente Situacao'), ['controller' => 'ClienteSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?></li>
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
<div class="empresas index large-9 medium-8 columns content">
    <h3><?= __('Empresas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf_cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razao_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_fantasia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_fim') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mensal') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= $this->Number->format($empresa->id) ?></td>
                <td><?= h($empresa->tipo) ?></td>
                <td><?= h($empresa->cpf_cnpj) ?></td>
                <td><?= h($empresa->razao_social) ?></td>
                <td><?= h($empresa->nome_fantasia) ?></td>
                <td><?= h($empresa->data_inicio) ?></td>
                <td><?= h($empresa->data_fim) ?></td>
                <td><?= h($empresa->created) ?></td>
                <td><?= h($empresa->modified) ?></td>
                <td><?= $this->Number->format($empresa->mensal) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empresa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empresa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?>
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
