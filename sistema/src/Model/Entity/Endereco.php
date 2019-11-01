<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property string $logradouro
 * @property int|null $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property int|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property string $principal
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Endereco extends Entity
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
        'id' => true,
        'pessoa_id' => true,
        'logradouro' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cep' => true,
        'cidade' => true,
        'estado' => true,
        'principal' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'pessoa' => true,
    ];

    public function enderecoCompleto(){
        return $this->logradouro.', '
              .(empty($this->numero)?'s/n':$this->numero)
              .(!empty($this->complemento)?', '.$this->complemento:'')
              .(!empty($this->bairro)?', bairro '.$this->bairro:'')
              .', CEP '.$this->cep.', '
              .$this->cidade.', '
              .$this->estado;
    }

    public function validaEnderecoCompleto(){
        $retorno = '';
        if(empty($this->logradouro)){
            $retorno.='1';
        }
        if(empty($this->bairro)){
            $retorno.='2';
        }
        if(empty($this->cep)){
            $retorno.='3';
        }
        if(empty($this->cidade)){
            $retorno.='4';
        }
        if(empty($this->estado)){
            $retorno.='5';
        }

        if($retorno == '')
            return true;
        else
            return $retorno;
    }
}
