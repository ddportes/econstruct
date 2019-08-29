<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissoes Model
 *
 * @property \App\Model\Table\PermissaoPaisTable&\Cake\ORM\Association\BelongsTo $PermissaoPais
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\PermissaoPapeisTable&\Cake\ORM\Association\HasMany $PermissaoPapeis
 *
 * @method \App\Model\Entity\Permissao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permissao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permissao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permissao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permissao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permissao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permissao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permissao findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PermissoesTable extends Table
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

        $this->setTable('permissoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('PermissaoPais', [
            'foreignKey' => 'permissao_pai_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('PermissaoPapeis', [
            'foreignKey' => 'permissao_id'
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
            ->maxLength('descricao', 125)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('descricao_amigavel')
            ->maxLength('descricao_amigavel', 255)
            ->allowEmptyString('descricao_amigavel', null, 'create');

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
        $rules->add($rules->existsIn(['permissao_pai_id'], 'PermissaoPais'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
