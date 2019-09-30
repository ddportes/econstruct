<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inscricao $inscricao
 */

?>
<div class="app-header__logo">
    <a href="<?= $this->Url->build('/home') ?>" title="Home"> <div class="logo-src"></div></a>

    <div class="header__pane ml-auto">
        <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
</div>
<div class="app-header__mobile-menu">
    <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
</div>
<div class="app-header__menu">
    <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
        </button>
    </span>
</div>    
<div class="app-header__content">
    <div class="app-header-left">
        <ul class="header-menu nav">
            <li class="nav-item">
                <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" onclick="$('#menu_visita').toggle();" aria-expanded="false" class="nav-link">
                        <i class="nav-link-icon fas fa-id-badge"> </i>
                        <?= __('Nova Visita') ?>
                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div id="menu_visita" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <?= $this->Html->Link('Cliente Novo',['controller'=>'Ocorrencias','action'=>'visitaNovoCliente'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>
                        <?= $this->Html->Link('Cliente Existente',['controller'=>'Ocorrencias','action'=>'visita'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>
                        <?= $this->Html->Link('Todas as Visitas',['controller'=>'Ocorrencias','action'=>'todasVisitas'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" onclick="$('#menu_projeto').toggle();" aria-expanded="false" class="nav-link">
                        <i class="nav-link-icon fas fa-project-diagram"></i>
                        <?= __('Projetos') ?>
                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div id="menu_projeto" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <?= $this->Html->Link('Novo Projeto',['controller'=>'Projetos','action'=>'add'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>
                        <?= $this->Html->Link('Todos os Projetos',['controller'=>'Projetos','action'=>'index'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>

                    </div>
                </div>
            </li>
            <li class="dropdown nav-item">
                <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon fas fa-wallet"></i>
                    Lançar Notas
                </a>
            </li>
            <li class="dropdown nav-item">
                <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon fas fa-money-bill-alt"></i>
                    Emitir Recibo
                </a>
            </li>
        </ul>
    </div>
    <div class="app-header-right">
        <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" onclick="$('#menu_user').toggle();" aria-expanded="false" class="p-0 btn">
                                <?= empty($userSession) ? '' : ($userSession['username']) ?>
                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                            </a>
                            <div id="menu_user" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <?= $this->Html->Link('Trocar Senha',['controller'=>'Users','action'=>'edit',$userSession['id']],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>

                                <?php if(isset($isAdmin)): ?>
                                    <?= $this->Html->Link('Trocar Empresa',['controller'=>'Users','action'=>'trocarEmpresa'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>
                                <?php endif; ?>

                                <?php if(isset($isAdmin)): ?>
                                    <?= $this->Html->Link('Gerenciar Usuários',['controller'=>'Users','action'=>'index'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>
                                <?php endif; ?>

                                <?= $this->Html->Link('Logout',['controller'=>'Users','action'=>'logout'],['role'=>'button','class'=>'dropdown-item','tabindex'=>'0']) ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>        
    </div>
</div>