<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orcamento $orcamento
 */
?>


<?= $this->Html->script('orcamento.js') ?>
<div id="cadOrcamento" >
    <script>
        var hashOrcamento = '<?= $this->request->getParam("_csrfToken") ?>';
    </script>
    <div class="modal-header">
        <h5 class="modal-title">Cadastro de Orçamentos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php if(!empty($projeto_id)): ?>
        <div class="modal-body">
            <h5 class="card-title">Orçamentos Gerados</h5>
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('id','ID') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('projeto_id','Projeto') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('custo','Custo Previsto') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('total','Total Orçado') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('data_inicial','Prev. Início') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('data_entrega','Prev. Entrega') ?></th>
                        <th scope="col" style="vertical-align: top"><?= h('Tem Contrato?') ?></th>
                        <th scope="col" class="actions" style="vertical-align: top;"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($orcamentos->count() > 0): ?>
                        <?php foreach ($orcamentos as $o): ?>
                            <tr>
                                <td scope="row" style="vertical-align: top"><?= $this->Number->format($o->id) ?></td>
                                <td style="vertical-align: top"><?= $o->has('projeto') ? $this->Html->link($o->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $o->projeto->id]) : '' ?></td>
                                <td style="vertical-align: top"><?= $o->custo(true) ?></td>
                                <td style="vertical-align: top"><?= $o->total(true) ?></td>
                                <td style="vertical-align: top"><?= (is_null($o->data_inicial)?'':h(date_format($o->data_inicial,'d/m/Y'))) ?></td>
                                <td style="vertical-align: top"><?= (is_null($o->data_entrega)?'':h(date_format($o->data_entrega,'d/m/Y'))) ?></td>
                                <td style="vertical-align: top"><?= ($o->hasContrato()?'Sim':'Não') ?></td>
                                <td class="actions" style="vertical-align: top">
                                    <?= $this->Html->link('<i class="fas fa-pen-square"></i>', ['action'=>'retornaOrcamento',$o->id],['Title'=>'Editar Orcamento','class'=>'btn btn-xs form-edit-orcamento','style'=>'padding: 0','escape'=>false]) ?>
                                    <?= $this->Html->link('<i class="fas fa-file-alt"></i>',
                                                                ['controller'=>'Contratos','action'=>'add'],
                                                                ['title'=>'Gerar Contrato',
                                                                 'id'=>'botaoContratoModal',
                                                                 'class'=>'btn btn-xs modal_xl_link',
                                                                 'style'=>'padding: 0',
                                                                 'escape'=>false]) ?>
                                    <div style="display:inline-block;padding:0">
                                        <?= $this->Form->postButton('<i class="fas fa-trash-alt"></i>', [
                                            'action' => 'delete',
                                            $o->id,$projeto_id
                                        ],
                                        [
                                            'data'=>['id'=>$o->id,'projeto_id'=>$projeto_id],
                                            'form' => [
                                                'id' => 'form-delete-orcamento-' . $o->id,
                                                'class' => 'form-delete-orcamento'
                                            ],
                                            'block' => true,
                                            'id' => 'botaoExcluirOrcamento',
                                            'class' => 'btn btn-xs',
                                            'style'=>'padding:0',
                                            'confirm' => __('Deseja realmente excluir o orçamento {0}?', $o->id),
                                            'title' => __('Excluir Orçamento'),
                                            'escape' => false
                                        ]) ?>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <th colspan="4" scope="row"><?= __('Não há orçamentos cadastrados.') ?></th>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?= $this->Form->create($orcamento,['id'=>'formOrcamento']) ?>
        <div class="modal-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Preencha as informações abaixo</h5>
                <?= $this->Form->control('id',['label'=>false,'name'=>'id','id'=>'id','type'=>'hidden']); ?>
                <?= $this->Form->control('projeto_id',['label'=>false,'name'=>'projeto_id','id'=>'projeto_id','value'=>$projeto_id,'type'=>'hidden']); ?>
                <button id="novoOrcamento" type="reset" type="button" class="btn btn-sm btn-primary close-popdown">Novo Orcamento</button>
            </div>
            <div class="position-relative row form-group">
                <label class="col-sm-2 col-form-label">ID do Orçamento:</label>
                <div class="col-sm-10">
                    <h5 id="idOrcamento"></h5>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="custo" class="col-sm-2 col-form-label">Custo Previsto:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('custo',['label'=>false,'type'=>'text','name'=>'custo','id'=>'custo','class'=>'form-control','placeholder'=>'R$']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="total" class="col-sm-2 col-form-label">Valor Total Previsto:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('total',['label'=>false,'type'=>'text','name'=>'total','id'=>'total','class'=>'form-control','placeholder'=>'R$']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="data_inicial" class="col-sm-2 col-form-label">Data de Início Prevista:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('data_inicial', ['id'=>'data_inicial','type'=>'text','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="data_entrega" class="col-sm-2 col-form-label">Data de Entrega Prevista:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('data_entrega', ['id'=>'data_entrega','type'=>'text','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="observacao" class="col-sm-2 col-form-label">Observações:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('observacao', ['id'=>'observacao','type'=>'textarea','label'=>false,'placeholder'=>'Observações desse Orçamento','class' => 'form-control']); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['id'=>'salvarOrcamento','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>

    <?php else: ?>
        <div class="modal-body"><h5 class="card-title">Selecione um projeto</h5>
        </div>
    <?php endif; ?>
</div>