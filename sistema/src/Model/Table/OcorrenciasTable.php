<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ocorrencias Model
 *
 * @property \App\Model\Table\OcorrenciaTiposTable&\Cake\ORM\Association\BelongsTo $OcorrenciaTipos
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Ocorrencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ocorrencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ocorrencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ocorrencia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ocorrencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OcorrenciasTable extends Table
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

        $this->setTable('ocorrencias');
        $this->setDisplayField('data');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('OcorrenciaTipos', [
            'foreignKey' => 'ocorrencia_tipo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id'
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

        $validator
            ->scalar('observacao')
            ->allowEmptyString('observacao');

        $validator
            ->date('data')
            ->allowEmptyDate('data');

        $validator
            ->date('data_pendencia')
            ->allowEmptyDate('data_pendencia');

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
        $rules->add($rules->existsIn(['ocorrencia_tipo_id'], 'OcorrenciaTipos'));
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
