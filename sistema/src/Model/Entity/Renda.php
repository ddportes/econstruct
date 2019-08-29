<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Renda Entity
 *
 * @property int $id
 * @property string|null $fonte_pagadora
 * @property string|null $tipo
 * @property string|null $cpf_cnpj
 * @property float|null $renda_bruta
 * @property float|null $renda_liquida
 * @property int $pessoa_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Renda extends Entity
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
        'fonte_pagadora' => true,
        'tipo' => true,
        'cpf_cnpj' => true,
        'renda_bruta' => true,
        'renda_liquida' => true,
        'pessoa_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'pessoa' => true
    ];
}
