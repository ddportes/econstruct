<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property int $cliente_situacao_id
 * @property string|null $observacao
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\ClienteSituacao $cliente_situacao
 * @property \App\Model\Entity\Projeto[] $projetos
 */
class Cliente extends Entity
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
        'cliente_situacao_id' => true,
        'observacao' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'pessoa' => true,
        'cliente_situacao' => true,
        'projetos' => true
    ];

    public function hasProjeto(){
        if(count($this->projetos)>0){
            return true;
        }
        return false;
    }
}
