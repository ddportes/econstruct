<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $nome_social
 * @property int|null $estado_civil
 * @property int|null $conjuge_id
 * @property int $filhos
 * @property string|null $sexo
 * @property string $tipo
 * @property string|null $cpf_cnpj
 * @property string|null $rg
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $conjuge
 * @property \App\Model\Entity\Cliente[] $clientes
 * @property \App\Model\Entity\Contato[] $contatos
 * @property \App\Model\Entity\Endereco[] $enderecos
 * @property \App\Model\Entity\Fornecedor[] $fornecedores
 * @property \App\Model\Entity\Pedreiro[] $pedreiros
 * @property \App\Model\Entity\Renda[] $rendas
 */
class Pessoa extends Entity
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
        'nome' => true,
        'nome_social' => true,
        'estado_civil' => true,
        'conjuge_id' => true,
        'filhos' => true,
        'sexo' => true,
        'tipo' => true,
        'cpf_cnpj' => true,
        'rg' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'conjuge' => true,
        'clientes' => true,
        'contatos' => true,
        'enderecos' => true,
        'fornecedores' => true,
        'pedreiros' => true,
        'rendas' => true
    ];

    public function primeiroTelefone(){
        foreach($this->contatos as $val){
            if($val->tipo=='telefone'){
                return $val;
            }
        }
        return null;
    }

    public function todosTelefones(){
        $telefones = '';
        foreach($this->contatos as $val){
            if($val->tipo=='telefone'){
                if($telefones == '')
                    $telefones = $val->valor;
                else
                    $telefones = $telefones . '/'.$val->valor;
            }
        }
        if($telefones == '')
            return null;
        else
            return $telefones;
    }

    public function primeiroEmail(){
        foreach($this->contatos as $val){
            if($val->tipo=='email'){
                return $val;
            }
        }
        return null;
    }

    public function todosEmails(){
        $emails = '';
        foreach($this->contatos as $val){
            if($val->tipo=='email'){
                if($emails == '')
                    $emails = $val->valor;
                else
                    $emails = $emails . '/'.$val->valor;
            }
        }
        if($emails == '')
            return null;
        else
            return $emails;
    }
}
