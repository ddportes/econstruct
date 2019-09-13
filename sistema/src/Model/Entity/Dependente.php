<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dependente Entity
 *
 * @property int $id
 * @property int|null $pessoa_id
 * @property int|null $pai_mae_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Pessoa $pai_mae
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\U $u
 */
class Dependente extends Entity
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
        'pessoa_id' => true,
        'pai_mae_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'pessoa' => true,
        'pai_mao' => true,
        'empresa' => true,
        'u' => true
    ];
}
