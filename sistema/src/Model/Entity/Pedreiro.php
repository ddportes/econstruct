<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedreiro Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property int|null $pedreiro_situacao_id
 * @property string|null $observacao
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\PedreiroSituacao $pedreiro_situacao
 * @property \App\Model\Entity\EquipePedreiro[] $equipe_pedreiros
 */
class Pedreiro extends Entity
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
        'pedreiro_situacao_id' => true,
        'observacao' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'pessoa' => true,
        'pedreiro_situacao' => true,
        'equipe_pedreiros' => true
    ];
}
