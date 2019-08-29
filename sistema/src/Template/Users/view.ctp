<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Visualização do Usuário <strong><?= h($user->username) ?></strong>.
                <div class="page-title-subheading">
                    <p>Adicione, edite, resete senha dos usuários.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Detalhes</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <tr>
                            <th scope="row"><?= __('ID') ?></th>
                            <th scope="row"><?= $this->Number->format($user->id) ?></th>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Usuário') ?></th>
                            <td><?= h($user->username) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Papel') ?></th>
                            <td><?= h($user->user_papeis[0]->papel->descricao) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Permissões</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <?php if(isset($user->user_papeis[0]->papel->permissao_papeis) && !empty($user->user_papeis[0]->papel->permissao_papeis)): ?>
                            <?php foreach($user->user_papeis[0]->papel->permissao_papeis as $key=>$val):?>
                                <?php if(is_null($val->permissao->permissao_pai_id)): ?>
                                    <tr>
                                        <th scope="row"><?= $val->permissao->descricao_amigavel ?></th>
                                    </tr>
                                    <?php foreach($user->user_papeis[0]->papel->permissao_papeis as $key_f=>$val_f):?>
                                        <?php if($val_f->permissao->permissao_pai_id == $val->permissao->id): ?>
                                    <tr>
                                        <td scope="row"><span style="margin-left:30px;"><?= $val_f->permissao->descricao_amigavel ?></span></td>
                                    </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th scope="row"><?= __('Não há permissões associadas.') ?></th>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
