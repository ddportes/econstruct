<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recebimento Entity
 *
 * @property int $id
 * @property int $projeto_id
 * @property float $valor
 * @property \Cake\I18n\FrozenDate|null $data
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $observacao
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 */
class Recebimento extends Entity
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
        'valor' => true,
        'data' => true,
        'created' => true,
        'modified' => true,
        'observacao' => true,
        'empresa_id' => true,
        'u_id' => true,
        'projeto' => true
    ];

    /**
     * @param bool|null $moeda
     * @return string
     */
    public function valor($moeda = null){
        if($moeda === true){
            return Number::format($this->valor,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return Number::format($this->valor,['pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);

    }
}
