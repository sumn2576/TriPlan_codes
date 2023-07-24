<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faketraveltags Model
 *
 * @property \App\Model\Table\FakeplansTable&\Cake\ORM\Association\BelongsTo $FakePlans
 *
 * @method \App\Model\Entity\Faketraveltag newEmptyEntity()
 * @method \App\Model\Entity\Faketraveltag newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Faketraveltag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faketraveltag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Faketraveltag findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Faketraveltag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Faketraveltag[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faketraveltag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faketraveltag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faketraveltag[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketraveltag[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketraveltag[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Faketraveltag[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FaketraveltagsTable extends Table
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

        $this->setTable('fake_travel_tags');
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
            ->scalar('travel_tagname')
            ->maxLength('travel_tagname', 10)
            ->allowEmptyString('travel_tagname');

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
