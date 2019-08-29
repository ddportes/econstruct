<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \App\Model\Table\PessoasTable&\Cake\ORM\Association\BelongsTo $Conjuges
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 * @property \App\Model\Table\ContatosTable&\Cake\ORM\Association\HasMany $Contatos
 * @property \App\Model\Table\EnderecosTable&\Cake\ORM\Association\HasMany $Enderecos
 * @property \App\Model\Table\FornecedoresTable&\Cake\ORM\Association\HasMany $Fornecedores
 * @property \App\Model\Table\PedreirosTable&\Cake\ORM\Association\HasMany $Pedreiros
 * @property \App\Model\Table\RendasTable&\Cake\ORM\Association\HasMany $Rendas
 *
 * @method \App\Model\Entity\Pessoa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pessoa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pessoa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PessoasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pessoas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'conjuge_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Contatos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Enderecos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Fornecedores', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pedreiros', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Rendas', [
            'foreignKey' => 'pessoa_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('nome_social')
            ->maxLength('nome_social', 255)
            ->allowEmptyString('nome_social');

        $validator
            ->integer('estado_civil')
            ->allowEmptyString('estado_civil');

        $validator
            ->integer('filhos')
            ->notEmptyString('filhos');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 1)
            ->allowEmptyString('sexo');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('cpf_cnpj')
            ->maxLength('cpf_cnpj', 15)
            ->allowEmptyString('cpf_cnpj');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 125)
            ->allowEmptyString('rg');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'users'));

        return $rules;
    }
}
