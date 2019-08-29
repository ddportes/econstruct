<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @property \App\Model\Table\FornecedorSituacoesTable&\Cake\ORM\Association\BelongsTo $FornecedorSituacoes
 * @property \App\Model\Table\PessoasTable&\Cake\ORM\Association\BelongsTo $Pessoas
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\ItensTable&\Cake\ORM\Association\HasMany $Itens
 *
 * @method \App\Model\Entity\Fornecedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FornecedoresTable extends Table
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

        $this->setTable('fornecedores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('FornecedorSituacoes', [
            'foreignKey' => 'fornecedor_situacao_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('Itens', [
            'foreignKey' => 'fornecedor_id'
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
        $rules->add($rules->existsIn(['fornecedor_situacao_id'], 'FornecedorSituacoes'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
