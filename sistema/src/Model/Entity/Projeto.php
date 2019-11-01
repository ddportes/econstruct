<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Number;

/**
 * Projeto Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string|null $detalhes
 * @property int $cliente_id
 * @property string|null $pasta_projeto
 * @property int $projeto_situacao_id
 * @property int|null $contrato_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property float|null $custo_estimado
 * @property float|null $terreno
 * @property float|null $frente
 * @property float|null $fundo
 * @property float|null $area_construida_coberta
 * @property float|null $area_construida_aberta
 * @property string|null $observacao
 * @property int|null $endereco_id
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\ProjetoSituacao $projeto_situacao
 * @property \App\Model\Entity\Contrato $contrato
 * @property \App\Model\Entity\Equipe[] $equipes
 * @property \App\Model\Entity\Nota[] $notas
 * @property \App\Model\Entity\Ocorrencia[] $ocorrencias
 * @property \App\Model\Entity\Orcamento[] $orcamentos
 * @property \App\Model\Entity\Recebimento[] $recebimentos
 * @property \App\Model\Entity\Recibo[] $recibos
 * @property \App\Model\Entity\Endereco $endereco
 */
class Projeto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'descricao' => true,
        'detalhes' => true,
        'cliente_id' => true,
        'pasta_projeto' => true,
        'projeto_situacao_id' => true,
        'contrato_id' => true,
        'created' => true,
        'modified' => true,
        'custo_estimado' => true,
        'observacao' => true,
        'empresa_id' => true,
        'u_id' => true,
        'cliente' => true,
        'projeto_situacao' => true,
        'contrato' => true,
        'equipes' => true,
        'notas' => true,
        'ocorrencias' => true,
        'orcamentos' => true,
        'recebimentos' => true,
        'recibos' => true,
        'terreno'=>true,
        'area_construida_coberta'=>true,
        'area_construida_aberta'=>true,
        'endereco_id' => true,
        'frente' => true,
        'fundo' => true
    ];

    /**
     * @param bool|null $moeda
     * @return string
     */
    public function custoEstimado($moeda = null){
        if($moeda === true){
            return Number::format($this->custo_estimado,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return Number::format($this->custo_estimado,['pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);

    }

    /**
     * @param bool|null  $moeda
     * @return string
     */
    public function totalRecebimentos($moeda = null){
        $valor= 0;
        foreach($this->recebimentos as $val){
            $valor = $valor + $val->valor;
        }
        if($moeda === true){
            return Number::format($valor,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $valor;

    }

    /**
     * @param bool|null  $moeda
     * @return string
     */
    public function totalRecibos($moeda = null){
        $valor= 0;
        foreach($this->recibos as $val){
            $valor = $valor + $val->valor;
        }
        if($moeda === true){
            return Number::format($valor,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $valor;
    }

    /**
     * @param bool|null  $moeda
     * @return string
     */
    public function totalNotas($moeda = null){
        $valor= 0;
        foreach($this->notas as $val){
            $valor = $valor + $val->valor;
        }
        if($moeda === true){
            return Number::format($valor,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $valor;
    }

    public function frente($unidade = null){
        $frente = (!empty($this->frente)?$this->frente:0.0);

        if($unidade){
            return Number::format($frente,['after' => 'm', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $frente;
    }
    public function fundo($unidade = null){
        $fundo = (!empty($this->frente)?$this->frente:0.0);

        if($unidade){
            return Number::format($fundo,['after' => 'm', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $fundo;
    }

    public function areaTerreno($unidade = null){
        $terreno = (!empty($this->terreno)?$this->terreno:0.0);

        if($unidade){
            return Number::format($terreno,['after' => 'm²', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $terreno;
    }

    public function areaConstruidaCoberta($unidade = null){
        $areaCob = (!empty($this->area_construida_coberta)?$this->area_construida_coberta:0.0);

        if($unidade){
            return Number::format($areaCob,['after' => 'm²', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $areaCob;
    }

    public function areaConstruidaAberta($unidade = null){
        $areaAbe = (!empty($this->area_construida_aberta)?$this->area_construida_aberta:0.0);

        if($unidade){
            return Number::format($areaAbe,['after' => 'm²', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $areaAbe;
    }

    public function areaTotalConstruida($unidade = null){
        $areaCob = (!empty($this->area_construida_coberta)?$this->area_construida_coberta:0.0);
        $areaAbe = (!empty($this->area_construida_aberta)?$this->area_construida_aberta:0.0);
        $soma = $areaCob+$areaAbe;

        if($unidade){
            return Number::format($soma,['after' => 'm²', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $soma;
    }

    public function taxaOcupacao($perc = null){

        $areaCob = (!empty($this->totalNotas())?$this->area_construida_coberta:0.0);
        $areaAbe = (!empty($this->area_construida_aberta)?$this->area_construida_aberta:0.0);
        $terr = (!empty($this->terreno)?$this->terreno:0.0);
        if($terr > 0) {
            $ocupacao = (($areaCob + $areaAbe) / $terr) * 100;
        }
        else{
            $ocupacao = 0;
        }

        if($perc){
            return Number::format($ocupacao,['after' => '%', 'locale' => 'pt_BR', 'places'=>2]);
        }

        return $ocupacao;
    }

    public function estimadoRealizadoCustos($perc = null){
        if($this->custo_estimado > 0) {
            $custo_realizado = $this->totalRecibos() + $this->totalNotas();

            $resultado = $custo_realizado / $this->custo_estimado;
        }else{
            $resultado = 0;
        }
        if ($perc) {
            return Number::format($resultado, ['after' => '%', 'locale' => 'pt_BR', 'places' => 2]);
        }


        return $resultado;
    }

    public function valorProjeto($moeda = null){
        $contrato = null;
        foreach($this->contratos as $c){
            if($c->id = $this->contrato_id){
                $contrato = $c;
            }
        }

        if($moeda === true){
            return Number::format($contrato->orcamento->total,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $contrato->orcamento->total;
    }


    public function estimadoRealizadoRecebimentos($perc = null){
        if($this->custo_estimado > 0) {
            $resultado = $this->totalRecebimentos() / $this->valorProjeto();
        }else{
            $resultado = 0;
        }
        if ($perc) {
            return Number::format($resultado, ['after' => '%', 'locale' => 'pt_BR', 'places' => 2]);
        }


        return $resultado;
    }

    public function hasContrato(){
        if(!is_null($this->contrato_id))
            return $this->contrato_id;
        return false;
    }
}
