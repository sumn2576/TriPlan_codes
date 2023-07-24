<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fakeplans Model
 *
 * @property \App\Model\Table\FakeTravelSpotsTable&\Cake\ORM\Association\HasMany $FakeTravelSpots
 * @property \App\Model\Table\FakeTravelTagsTable&\Cake\ORM\Association\HasMany $FakeTravelTags
 *
 * @method \App\Model\Entity\Fakeplan newEmptyEntity()
 * @method \App\Model\Entity\Fakeplan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fakeplan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fakeplan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fakeplan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fakeplan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fakeplan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fakeplan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fakeplan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fakeplan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fakeplan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fakeplan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fakeplan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FakeplansTable extends Table
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

        $this->setTable('fake_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('FakeTravelSpots', [
            'foreignKey' => 'fake_plan_id',
        ]);
        $this->hasMany('FakeTravelTags', [
            'foreignKey' => 'fake_plan_id',
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
            ->scalar('plan_name')
            ->maxLength('plan_name', 15)
            ->allowEmptyString('plan_name');

        $validator
            ->scalar('rural')
            ->maxLength('rural', 3)
            ->allowEmptyString('rural');

        $validator
            ->scalar('image_pass')
            ->allowEmptyFile('image_pass');

        return $validator;
    }
}
