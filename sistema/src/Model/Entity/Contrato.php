<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contrato Entity
 *
 * @property int $id
 * @property int $projeto_id
 * @property int $orcamento_id
 * @property int $data_assinatura
 * @property \Cake\I18n\FrozenDate $data_inicial
 * @property \Cake\I18n\FrozenDate $data_final
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Projeto[] $projetos
 * @property \App\Model\Entity\Orcamento $orcamento
 */
class Contrato extends Entity
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
        'orcamento_id' => true,
        'data_assinatura' => true,
        'data_inicial' => true,
        'data_final' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'projetos' => true,
        'orcamento' => true
    ];
}
