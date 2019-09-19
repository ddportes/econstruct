<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'e-Construct';
?>
<?= $this->Html->script('https://www.gstatic.com/charts/loader.js',['block'=>true]) ?>
<?php
    $this->Html->scriptStart(['block' => true]);

    echo "    
    
google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
        ['Período da Obra','Mão de Obra','Base','Cobertura','Acabamento'],
            ['Janeiro',100,90,20,60],
            ['Fevereiro',18,100,80,50],
            ['Março',70,35,15,100],
            ['Abril',60,80,25,40],
            ['Maio',70,35,15,100],
            ['Junho',70,35,15,100]
      ]);

      var options = {
        title: 'Custos da Obra',
        chartArea: {width: '70%'},
        seriesType: 'bars',
        hAxis: {
          minValue: 0
        },
        vAxis: {
          title: 'Custo (R$)'
        }
      };

      var chart = new google.visualization.ComboChart(document.getElementById('canvas'));
      chart.draw(data, options);
    }
    ";

    $this->Html->scriptEnd();
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-plugin icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>e-Construct - Gestão de Obras.
                <div class="page-title-subheading">Estatísticas da sua empresa no e-Construct.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total de Visitas</div>
                    <div class="widget-subheading">Cadastradas</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $qtdVisitas?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Clientes Convertidos</div>
                    <div class="widget-subheading">Cadastrados</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $qtdCliConv ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Projetos</div>
                    <div class="widget-subheading">Em Andamento</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?= $qtdProjAnd ?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper  text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total de Clientes</div>
                        <div class="widget-subheading">Cadastrados</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><?= count($clientes) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper  text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total de Projetos</div>
                        <div class="widget-subheading">Cadastrados</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><?= count($projetos) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper  text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total de Fornecedores</div>
                        <div class="widget-subheading">Cadastrados</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><?= count($fornecedores) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Últimas 5 Visitas Realizadas</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nome do Cliente</th>
                        <th class="text-center">Situação do Cliente</th>
                        <th class="text-center">Projeto</th>
                        <th class="text-center">Situação do Projeto</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $ocorrencias = $ocorrencias->limit(5)->order(['Ocorrencias.id DESC']); ?>
                    <?php if($ocorrencias->count() > 0): ?>
                        <?php foreach($ocorrencias as $val): ?>

                        <tr>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading"><?= $val->projeto->cliente->pessoa->nome ?></div>
                                            <div class="widget-subheading opacity-7"><?= $val->projeto->cliente->pessoa->allTelefones() ?></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php if($val->projeto->cliente->cliente_situacao_id == 1): ?>
                                <div class="badge badge-primary">
                                    <?php elseif($val->projeto->cliente->cliente_situacao_id == 2): ?>
                                        <div class="badge badge-secondary">
                                    <?php elseif($val->projeto->cliente->cliente_situacao_id == 3): ?>
                                        <div class="badge badge-warning>
                                    <?php elseif($val->projeto->cliente->cliente_situacao_id == 4): ?>
                                        <div class="badge badge-success>
                                    <?php elseif($val->projeto->cliente->cliente_situacao_id == 5): ?>
                                        <div class="badge badge-alt>
                                    <?php else: ?>
                                        <div class="badge badge-danger>
                                <?php endif; ?>
                                     <?= $val->projeto->cliente->cliente_situacao->descricao ?></div>
                            </td>
                            <td class="text-center"><?= $val->projeto->descricao ?></td>
                            <td class="text-center">
                                <div class="badge
                                <?php if($val->projeto->projeto_situacao_id == 1): ?>
                                    badge-primary
                                <?php elseif($val->projeto->projeto_situacao_id == 2): ?>
                                    badge-secondary
                                <?php elseif($val->projeto->projeto_situacao_id >= 3 && $val->projeto->projeto_situacao_id <= 8 ): ?>
                                    badge-warning
                                <?php elseif($val->projeto->projeto_situacao_id >= 9 && $val->projeto->projeto_situacao_id <= 10 ): ?>
                                    badge-alt
                                <?php else: ?>
                                    badge-success
                                <?php endif; ?>">
                                     <?= $val->projeto->projeto_situacao->descricao ?></div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center">Não há visitas cadastradas</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    Projeto em Andamento
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <div id="canvas" style="height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


