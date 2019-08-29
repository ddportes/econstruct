<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissaoPapeis Model
 *
 * @property \App\Model\Table\PermissoesTable&\Cake\ORM\Association\BelongsTo $Permissoes
 * @property \App\Model\Table\PapeisTable&\Cake\ORM\Association\BelongsTo $Papeis
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\PermissaoPapel get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissaoPapel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissaoPapel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissaoPapel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissaoPapel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissaoPapel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissaoPapel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissaoPapel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PermissaoPapeisTable extends Table
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

        $this->setTable('permissao_papeis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('Permissoes', [
            'foreignKey' => 'permissao_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Papeis', [
            'foreignKey' => 'papel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
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
        $rules->add($rules->existsIn(['permissao_id'], 'Permissoes'));
        $rules->add($rules->existsIn(['papel_id'], 'Papeis'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
