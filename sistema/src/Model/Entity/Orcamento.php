<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Number;

/**
 * Orcamento Entity
 *
 * @property int $id
 * @property int $projeto_id
 * @property float|null $custo
 * @property float|null $total
 * @property \Cake\I18n\FrozenDate|null $data_inicial
 * @property \Cake\I18n\FrozenDate|null $data_entrega
 * @property string|null $observacao
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Contrato[] $contratos
 */
class Orcamento extends Entity
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
        'projeto_id' => true,
        'custo' => true,
        'total' => true,
        'data_inicial' => true,
        'data_entrega' => true,
        'observacao' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'projeto' => true,
        'contratos' => true
    ];

    public function hasContrato(){

            if(!empty($this->contratos)){
                if($this->id == $this->contratos[0]->orcamento_id){
                    return true;
                }
            }

        return false;
    }

    public function custo($moeda = null){
        if($moeda === true){
            return Number::format($this->custo,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return Number::format($this->custo,['pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
    }

    public function total($moeda = null){
        if($moeda === true){
            return Number::format($this->total,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return Number::format($this->total,['pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
    }
}
