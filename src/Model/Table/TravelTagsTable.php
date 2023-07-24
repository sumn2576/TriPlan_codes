<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TravelTags Model
 *
 * @property \App\Model\Table\PlansTable&\Cake\ORM\Association\BelongsTo $Plans
 *
 * @method \App\Model\Entity\TravelTag newEmptyEntity()
 * @method \App\Model\Entity\TravelTag newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TravelTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TravelTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\TravelTag findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TravelTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TravelTag[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TravelTag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelTag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelTag[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelTag[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelTag[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TravelTag[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TravelTagsTable extends Table
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

        $this->setTable('travel_tags');
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
            ->scalar('travel_tagname')
            ->maxLength('travel_tagname', 10)
            ->requirePresence('travel_tagname', 'create')
            ->notEmptyString('travel_tagname');

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
