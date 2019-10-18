<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// @property \App\Model\Table\ContratosTable&\Cake\ORM\Association\HasMany $Contratos
/**
 * Projetos Model
 *
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\ProjetoSituacoesTable&\Cake\ORM\Association\BelongsTo $ProjetoSituacoes
 * @property \App\Model\Table\ContratosTable&\Cake\ORM\Association\BelongsTo $Contratos
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\EquipesTable&\Cake\ORM\Association\HasMany $Equipes
 * @property \App\Model\Table\NotasTable&\Cake\ORM\Association\HasMany $Notas
 * @property \App\Model\Table\OcorrenciasTable&\Cake\ORM\Association\HasMany $Ocorrencias
 * @property \App\Model\Table\OrcamentosTable&\Cake\ORM\Association\HasMany $Orcamentos
 * @property \App\Model\Table\RecebimentosTable&\Cake\ORM\Association\HasMany $Recebimentos
 * @property \App\Model\Table\RecibosTable&\Cake\ORM\Association\HasMany $Recibos
 *
 * @method \App\Model\Entity\Projeto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projeto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projeto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projeto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjetosTable extends Table
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

        $this->setTable('projetos');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
        ]);

        $this->belongsTo('ProjetoSituacoes', [
            'foreignKey' => 'projeto_situacao_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Contratos', [
            'foreignKey' => 'contrato_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('Contratos', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Equipes', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Notas', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Ocorrencias', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Orcamentos', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Recebimentos', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Recibos', [
            'foreignKey' => 'projeto_id'
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
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('detalhes')
            ->allowEmptyString('detalhes');

        $validator
            ->scalar('pasta_projeto')
            ->maxLength('pasta_projeto', 255)
            ->allowEmptyString('pasta_projeto');

        $validator
            ->decimal('orcamento')
            ->allowEmptyString('orcamento');

        $validator
            ->decimal('custo_estimado')
            ->allowEmptyString('custo_estimado');

        $validator
            ->decimal('terreno')
            ->allowEmptyString('terreno');

        $validator
            ->decimal('frente')
            ->allowEmptyString('frente');

        $validator
            ->decimal('fundo')
            ->allowEmptyString('fundo');

        $validator
            ->decimal('area_construida_coberta')
            ->allowEmptyString('area_construida_coberta');

        $validator
            ->decimal('area_construida_aberta')
            ->allowEmptyString('area_construida_aberta');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['endereco_id'], 'Enderecos'));
        $rules->add($rules->existsIn(['projeto_situacao_id'], 'ProjetoSituacoes'));
        $rules->add($rules->existsIn(['contrato_id'], 'Contratos'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
