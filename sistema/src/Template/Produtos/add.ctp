<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Novo Produto.
                    <div class="page-title-subheading">
                        <p>Preencha os campos abaixo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create($produto) ?>
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('descricao', ['id'=>'descricao','label'=>'Descrição','class' => 'form-control']); ?>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('produto_pai_id', ['type'=>'select','id'=>'produto_pai_id','label'=>'Selecione o Produto Pai','options'=>$produtos,'empty' => true,'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('produto_tipo_id', ['type'=>'select','id'=>'produto_tipo_id','label'=>'Selecione o Tipo de Produto','options'=>$produtoTipos,'empty' => true,'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                   

                </div>
                <div class="card-body" style="text-align: right;">
                    <?= $this->Form->button(__('Salvar'),['id'=>'salvar','type'=>'submit','class'=>'btn btn-success']) ?>
                </div>

            </div>
            <?= $this->Form->end() ?>
        </div>

    </div>