<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class JobsTable extends Table {

    public function initialize(array $config) {
        $this->table('jobs');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Projects');
        $this->belongsTo('Users');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->add('name', [
                    'unique' => [
                        'rule' => ['validateUnique', ['scope' => 'name']],
                        'provider' => 'table',
                        'message' => 'There is already a job with that name!'
                    ]
                ])
                ->add('duration', 'valid', ['rule' => 'numeric'])
                ->notEmpty('name')
                ->notEmpty('project_id')
                ->notEmpty('user_id')
                ->notEmpty('duration')
                ->notEmpty('notes');
        return $validator;
    }

}
