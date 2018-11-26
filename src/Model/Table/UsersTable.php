<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {
    
    public function initialize(array $config){
        $this->table('users');
	$this->displayField('name');
	$this->primaryKey('id');
        
        $this->hasMany('Jobs');
        $this->addBehavior('Timestamp');
    }
    
    public function validationDefault(Validator $validator) {
        $validator
                ->add('name', [
                    'unique' => [
                        'rule' => ['validateUnique', ['scope' => 'name']],
                        'provider' => 'table',
                        'message' => 'There is already a user with that name!'
                    ]
                ])
                ->add('isAdmin', 'valid', ['rule' => 'numeric'])
                ->notEmpty('name')
                ->notEmpty('password');
        return $validator;
    }
}
