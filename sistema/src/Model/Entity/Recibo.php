<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recibo Entity
 *
 * @property int $id
 * @property int|null $equipe_id
 * @property int|null $projeto_id
 * @property float|null $valor
 * @property \Cake\I18n\FrozenDate|null $data
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Equipe $equipe
 * @property \App\Model\Entity\Projeto $projeto
 */
class Recibo extends Entity
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
        'equipe_id' => true,
        'projeto_id' => true,
        'valor' => true,
        'data' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'equipe' => true,
        'projeto' => true,
        'u_id'=>true
    ];
}
