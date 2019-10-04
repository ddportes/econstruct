<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<script>
    var stSitDep = {
        sE: true,
        sF: true,
        sJ: true,
        sC: true,
        sP: true,
        sL: true
    }
</script>
<?= $this->Html->script('dependente.js') ?>
<div id="addDependente" >
    <?php echo $this->Flash->render() ?>
    <div class="modal-header">
        <h5 class="modal-title">Cadastro de Dependentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php if(!empty($pai_mae_id)): ?>
        <div class="modal-body">
            <h5 class="card-title">Dependentes Cadastrados</h5>
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('id','ID') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('nome','Nome') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('sexo','Sexo') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('cpf_cnpj','CPF') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('data_nascimento','Data de Nascimento') ?></th>
                        <th scope="col" class="actions" style="vertical-align: top"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($dependentes->count() > 0): ?>
                        <?php foreach ($dependentes as $d): ?>
                            <tr>
                                <td scope="row" style="vertical-align: top"><?= $this->Number->format($d->id) ?></td>
                                <td style="vertical-align: top"><?= $d->pessoa->nome ?></td>
                                <td style="vertical-align: top"><?= ($d->pessoa->sexo == 'M'?'Masculino':'Feminino') ?></td>
                                <td style="vertical-align: top"><?= $d->pessoa->cpfCnpj(true) ?></td>
                                <td style="vertical-align: top"><?= (is_null($d->pessoa->data_nascimento)?'':h(date_format($d->pessoa->data_nascimento,'d/m/Y'))) ?></td>
                                <td class="actions" style="vertical-align: top">
                                    <?= $this->Form->postButton('<i class="fas fa-trash-alt"></i>', [
                                        'action' => 'delete',
                                        $d->id,$pai_mae_id
                                    ],
                                        [
                                            'data'=>['id'=>$d->id,'pessoa_id'=>$pai_mae_id],
                                            'form' => [
                                                'id' => 'form-delete-dependente-' . $d->id,
                                                'class' => 'form-delete-dependente'
                                            ],
                                            'block' => true,
                                            'id' => 'botaoExcluirDependente',
                                            'class' => 'btn btn-xs',
                                            'confirm' => __('Deseja realmente excluir o dependente {0}?', $d->pessoa->nome),
                                            'title' => __('Excluir Dependente'),
                                            'escape' => false
                                        ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <th colspan="4" scope="row"><?= __('Não há dependentes cadastrados.') ?></th>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?= $this->Form->create(null,['id'=>'formDependente']) ?>
        <div class="modal-body">
            <h5 class="card-title">Preencha as informações abaixo</h5>
            <?= $this->Form->control('pai_mae_id', ['id'=>'pai_mae_id','type' => 'hidden','value'=>$pai_mae_id]); ?>
            <div class="position-relative row form-group">
                <label for="nomeDependente" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('nomeDependente',['label'=>false,'type'=>'text','name'=>'nomeDependente','id'=>'nomeDependente','class'=>'form-control','placeholder'=>'Digite o nome da(o) Dependente']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="sexoDependente" class="col-sm-2 col-form-label">Sexo:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('sexoDependente', ['label'=>false,'options'=>['M'=>'Masculino','F'=>'Feminino'],'id'=>'sexoDependente','class' => 'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="estadoCivilDependente" class="col-sm-2 col-form-label">Estado Civil:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('estadoCivilDependente', ['options'=>[''=>'','1'=>'Solteiro(a)','2'=>'Casado(a)','3'=>'Separado(a)','4'=>'Viúvo(a)','5'=>'União Estável(a)'],'id'=>'estadoCivilDependente','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>


            <div class="position-relative row form-group">
                <label for="cpfDepentente" class="col-sm-2 col-form-label">CPF:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('cpfDependente', ['id'=>'cpfDependente','label'=>false,'placeholder'=>'Somente números','class' => 'form-control cpf']); ?>
                    <div id="erro_cpf_dependente" role="alert" style="margin-top:4px;"></div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="rgDependente" class="col-sm-2 col-form-label">RG:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('rgDependente',['label'=>false,'type'=>'text','name'=>'rgDependente','id'=>'rgDependente','class'=>'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="dataNascimento" class="col-sm-2 col-form-label">Data de Nascimento:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('dataNascimento',['label'=>false,'type'=>'text','name'=>'dataNascimento','id'=>'dataNascimento','class'=>'form-control']); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['id'=>'salvarDependente','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>

    <?php else: ?>
        <div class="modal-body"><h5 class="card-title">Selecione um cliente</h5>
        </div>
    <?php endif; ?>
    <script>
        $(document).ready(function(){
            $("#erro_cpf_dependente").hide();
            $('.cpf').mask('000.000.000-00');
            $('.cpf').on('blur',function()
            {
                validaCpf($('.cpf'),$("#erro_cpf_dependente"),$('#salvarDependente'),stSitDep);
            });
        });
        $( function() {
            $( "#dataNascimento" ).datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: false,
                language: "pt-BR"
            });
        } );
    </script>
</div>