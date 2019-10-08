<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="projetos view large-9 medium-8 columns content">
    <h3><?= h($projeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($projeto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $projeto->has('cliente') ? $this->Html->link($projeto->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pasta Projeto') ?></th>
            <td><?= h($projeto->pasta_projeto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projeto Situacao') ?></th>
            <td><?= $projeto->has('projeto_situacao') ? $this->Html->link($projeto->projeto_situacao->id, ['controller' => 'ProjetoSituacoes', 'action' => 'view', $projeto->projeto_situacao->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projeto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contrato Id') ?></th>
            <td><?= $this->Number->format($projeto->contrato_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orcamento') ?></th>
            <td><?= $this->Number->format($projeto->orcamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Custo Estimado') ?></th>
            <td><?= $this->Number->format($projeto->custo_estimado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($projeto->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($projeto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($projeto->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Detalhes') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->detalhes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->observacao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Contratos') ?></h4>
        <?php if (!empty($projeto->contratos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Orcamento Id') ?></th>
                <th scope="col"><?= __('Data Assinatura') ?></th>
                <th scope="col"><?= __('Data Inicial') ?></th>
                <th scope="col"><?= __('Data Final') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->contratos as $contratos): ?>
            <tr>
                <td><?= h($contratos->id) ?></td>
                <td><?= h($contratos->projeto_id) ?></td>
                <td><?= h($contratos->orcamento_id) ?></td>
                <td><?= h($contratos->data_assinatura) ?></td>
                <td><?= h($contratos->data_inicial) ?></td>
                <td><?= h($contratos->data_final) ?></td>
                <td><?= h($contratos->created) ?></td>
                <td><?= h($contratos->modified) ?></td>
                <td><?= h($contratos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contratos', 'action' => 'view', $contratos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contratos', 'action' => 'edit', $contratos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contratos', 'action' => 'delete', $contratos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipes') ?></h4>
        <?php if (!empty($projeto->equipes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->equipes as $equipes): ?>
            <tr>
                <td><?= h($equipes->id) ?></td>
                <td><?= h($equipes->projeto_id) ?></td>
                <td><?= h($equipes->descricao) ?></td>
                <td><?= h($equipes->created) ?></td>
                <td><?= h($equipes->modified) ?></td>
                <td><?= h($equipes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Equipes', 'action' => 'view', $equipes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Equipes', 'action' => 'edit', $equipes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Equipes', 'action' => 'delete', $equipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notas') ?></h4>
        <?php if (!empty($projeto->notas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->notas as $notas): ?>
            <tr>
                <td><?= h($notas->id) ?></td>
                <td><?= h($notas->projeto_id) ?></td>
                <td><?= h($notas->data) ?></td>
                <td><?= h($notas->valor) ?></td>
                <td><?= h($notas->created) ?></td>
                <td><?= h($notas->modified) ?></td>
                <td><?= h($notas->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notas', 'action' => 'view', $notas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notas', 'action' => 'edit', $notas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notas', 'action' => 'delete', $notas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ocorrencias') ?></h4>
        <?php if (!empty($projeto->ocorrencias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ocorrencia Tipo Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->ocorrencias as $ocorrencias): ?>
            <tr>
                <td><?= h($ocorrencias->id) ?></td>
                <td><?= h($ocorrencias->ocorrencia_tipo_id) ?></td>
                <td><?= h($ocorrencias->projeto_id) ?></td>
                <td><?= h($ocorrencias->observacao) ?></td>
                <td><?= h($ocorrencias->data) ?></td>
                <td><?= h($ocorrencias->created) ?></td>
                <td><?= h($ocorrencias->modified) ?></td>
                <td><?= h($ocorrencias->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ocorrencias', 'action' => 'view', $ocorrencias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ocorrencias', 'action' => 'edit', $ocorrencias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ocorrencias', 'action' => 'delete', $ocorrencias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orcamentos') ?></h4>
        <?php if (!empty($projeto->orcamentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Custo') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Data Inicial') ?></th>
                <th scope="col"><?= __('Data Entrega') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->orcamentos as $orcamentos): ?>
            <tr>
                <td><?= h($orcamentos->id) ?></td>
                <td><?= h($orcamentos->projeto_id) ?></td>
                <td><?= h($orcamentos->custo) ?></td>
                <td><?= h($orcamentos->total) ?></td>
                <td><?= h($orcamentos->data_inicial) ?></td>
                <td><?= h($orcamentos->data_entrega) ?></td>
                <td><?= h($orcamentos->observacao) ?></td>
                <td><?= h($orcamentos->created) ?></td>
                <td><?= h($orcamentos->modified) ?></td>
                <td><?= h($orcamentos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orcamentos', 'action' => 'view', $orcamentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orcamentos', 'action' => 'edit', $orcamentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orcamentos', 'action' => 'delete', $orcamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orcamentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recebimentos') ?></h4>
        <?php if (!empty($projeto->recebimentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->recebimentos as $recebimentos): ?>
            <tr>
                <td><?= h($recebimentos->id) ?></td>
                <td><?= h($recebimentos->projeto_id) ?></td>
                <td><?= h($recebimentos->valor) ?></td>
                <td><?= h($recebimentos->data) ?></td>
                <td><?= h($recebimentos->created) ?></td>
                <td><?= h($recebimentos->modified) ?></td>
                <td><?= h($recebimentos->observacao) ?></td>
                <td><?= h($recebimentos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recebimentos', 'action' => 'view', $recebimentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recebimentos', 'action' => 'edit', $recebimentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recebimentos', 'action' => 'delete', $recebimentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recibos') ?></h4>
        <?php if (!empty($projeto->recibos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Equipe Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->recibos as $recibos): ?>
            <tr>
                <td><?= h($recibos->id) ?></td>
                <td><?= h($recibos->equipe_id) ?></td>
                <td><?= h($recibos->projeto_id) ?></td>
                <td><?= h($recibos->valor) ?></td>
                <td><?= h($recibos->data) ?></td>
                <td><?= h($recibos->created) ?></td>
                <td><?= h($recibos->modified) ?></td>
                <td><?= h($recibos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recibos', 'action' => 'view', $recibos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recibos', 'action' => 'edit', $recibos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recibos', 'action' => 'delete', $recibos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
