<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faketravelspots Model
 *
 * @property \App\Model\Table\FakeplansTable&\Cake\ORM\Association\BelongsTo $FakePlans
 *
 * @method \App\Model\Entity\Faketravelspot newEmptyEntity()
 * @method \App\Model\Entity\Faketravelspot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Faketravelspot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faketravelspot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Faketravelspot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Faketravelspot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Faketravelspot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faketravelspot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faketravelspot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faketravelspot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketravelspot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketravelspot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketravelspot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FaketravelspotsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('fake_travel_spots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FakePlans', [
            'foreignKey' => 'fake_plan_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('spot_name')
            ->maxLength('spot_name', 15)
            ->allowEmptyString('spot_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['fake_plan_id'], 'FakePlans'), ['errorField' => 'fake_plan_id']);

        return $rules;
    }
}
