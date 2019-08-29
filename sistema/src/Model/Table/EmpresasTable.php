<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \App\Model\Table\ClienteSituacoesTable&\Cake\ORM\Association\HasMany $ClienteSituacoes
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 * @property \App\Model\Table\ContratosTable&\Cake\ORM\Association\HasMany $Contratos
 * @property \App\Model\Table\EnderecosTable&\Cake\ORM\Association\HasMany $Enderecos
 * @property \App\Model\Table\EquipePedreirosTable&\Cake\ORM\Association\HasMany $EquipePedreiros
 * @property \App\Model\Table\EquipesTable&\Cake\ORM\Association\HasMany $Equipes
 * @property \App\Model\Table\FornecedorSituacoesTable&\Cake\ORM\Association\HasMany $FornecedorSituacoes
 * @property \App\Model\Table\FornecedoresTable&\Cake\ORM\Association\HasMany $Fornecedores
 * @property \App\Model\Table\ItensTable&\Cake\ORM\Association\HasMany $Itens
 * @property \App\Model\Table\NotasTable&\Cake\ORM\Association\HasMany $Notas
 * @property \App\Model\Table\OcorrenciaTiposTable&\Cake\ORM\Association\HasMany $OcorrenciaTipos
 * @property \App\Model\Table\OcorrenciasTable&\Cake\ORM\Association\HasMany $Ocorrencias
 * @property \App\Model\Table\OrcamentosTable&\Cake\ORM\Association\HasMany $Orcamentos
 * @property \App\Model\Table\PapeisTable&\Cake\ORM\Association\HasMany $Papeis
 * @property \App\Model\Table\PedreiroSituacoesTable&\Cake\ORM\Association\HasMany $PedreiroSituacoes
 * @property \App\Model\Table\PedreirosTable&\Cake\ORM\Association\HasMany $Pedreiros
 * @property \App\Model\Table\PermissaoPapeisTable&\Cake\ORM\Association\HasMany $PermissaoPapeis
 * @property \App\Model\Table\PermissoesTable&\Cake\ORM\Association\HasMany $Permissoes
 * @property \App\Model\Table\PessoasTable&\Cake\ORM\Association\HasMany $Pessoas
 * @property \App\Model\Table\ProdutoTiposTable&\Cake\ORM\Association\HasMany $ProdutoTipos
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\HasMany $Produtos
 * @property \App\Model\Table\ProjetoSituacoesTable&\Cake\ORM\Association\HasMany $ProjetoSituacoes
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\HasMany $Projetos
 * @property \App\Model\Table\RecebimentosTable&\Cake\ORM\Association\HasMany $Recebimentos
 * @property \App\Model\Table\RecibosTable&\Cake\ORM\Association\HasMany $Recibos
 * @property \App\Model\Table\RendasTable&\Cake\ORM\Association\HasMany $Rendas
 * @property \App\Model\Table\UserPapeisTable&\Cake\ORM\Association\HasMany $UserPapeis
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasTable extends Table
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

        $this->setTable('empresas');
        $this->setDisplayField('nome_fantasia');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ClienteSituacoes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Contratos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Enderecos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('EquipePedreiros', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Equipes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('FornecedorSituacoes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Fornecedores', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Itens', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Notas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('OcorrenciaTipos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Ocorrencias', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Orcamentos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Papeis', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('PedreiroSituacoes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Pedreiros', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('PermissaoPapeis', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Permissoes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Pessoas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ProdutoTipos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Produtos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ProjetoSituacoes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Recebimentos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Recibos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Rendas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('UserPapeis', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id'
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
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('cpf_cnpj')
            ->maxLength('cpf_cnpj', 15)
            ->requirePresence('cpf_cnpj', 'create')
            ->notEmptyString('cpf_cnpj');

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 255)
            ->allowEmptyString('razao_social');

        $validator
            ->scalar('nome_fantasia')
            ->maxLength('nome_fantasia', 255)
            ->requirePresence('nome_fantasia', 'create')
            ->notEmptyString('nome_fantasia');

        $validator
            ->date('data_inicio')
            ->allowEmptyDate('data_inicio');

        $validator
            ->date('data_fim')
            ->allowEmptyDate('data_fim');

        $validator
            ->decimal('mensal')
            ->allowEmptyString('mensal');

        $validator
            ->scalar('observacao')
            ->allowEmptyString('observacao');

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
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
