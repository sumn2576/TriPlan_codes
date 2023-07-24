<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TravelSpots Model
 *
 * @property \App\Model\Table\PlansTable&\Cake\ORM\Association\BelongsTo $Plans
 *
 * @method \App\Model\Entity\TravelSpot newEmptyEntity()
 * @method \App\Model\Entity\TravelSpot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TravelSpot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TravelSpot get($primaryKey, $options = [])
 * @method \App\Model\Entity\TravelSpot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TravelSpot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TravelSpot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TravelSpot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelSpot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelSpot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelSpot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelSpot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelSpot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TravelSpotsTable extends Table
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

        $this->setTable('travel_spots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
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
            ->requirePresence('spot_name', 'create')
            ->notEmptyString('spot_name');

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
        $rules->add($rules->existsIn(['plan_id'], 'Plans'), ['errorField' => 'plan_id']);

        return $rules;
    }
}
