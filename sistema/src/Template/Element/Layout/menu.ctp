<div class="app-header__logo">
    <div class="logo-src"></div>
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
<div class="scrollbar-sidebar" style="overflow:auto">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Principais</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-users"></i>
                    Visitas
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todas as Visitas'),['controller'=>'Ocorrencias','action'=>'todasVisitas'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Visita de Novo Cliente'),['controller'=>'Ocorrencias','action'=>'visitaNovoCliente'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Nova Visita de Cliente'),['controller'=>'Ocorrencias','action'=>'visita'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Projetos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Projetos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Projetos','action'=>'add'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-users"></i>
                    Clientes
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Clientes','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Clientes','action'=>'add'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>

            <li class="app-sidebar__heading">Cadastros</li>

            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Fornecedores
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Fornecedores','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Fornecedores','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Mapa Financeiro
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-tools"></i>
                    Pedreiros
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Pedreiros','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Pedreiros','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Mapa Financeiro
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cart"></i>
                    Produtos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Produtos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Produtos','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Tipos'),['controller'=>'ProdutoTipos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Mapa Financeiro
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-like2"></i>
                    Equipes
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todas'),['controller'=>'Equipes','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Nova'),['controller'=>'Equipes','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Mapa Financeiro
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Projetos - Apoio</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Ocorrências
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todas'),['controller'=>'Ocorrencias','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Nova'),['controller'=>'Ocorrencias','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Pendências
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-news-paper"></i>
                    Notas
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todas'),['controller'=>'Notas','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Nova'),['controller'=>'Notas','action'=>'add'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Mapa Financeiro
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-pen"></i>
                    Contratos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Contratos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-note"></i>
                    Recibos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Recibos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Recibos','action'=>'add'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Recebimentos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Todos'),['controller'=>'Recebimentos','action'=>'index'],['escape'=>false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->Link(__('<i class="metismenu-icon"></i>Novo'),['controller'=>'Recebimentos','action'=>'add'],['escape'=>false]) ?>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Relatórios</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display1"></i>
                    Estatísticos
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Relatórios
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Financeiros
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Relatórios
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-graph"></i>
                    Gráficos
                </a>
            </li>
        </ul>

    </div>
</div>