<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientsTable extends Table {
    
    public function initialize(array $config){
        $this->table('clients');
	$this->displayField('name');
	$this->primaryKey('id');
        
        $this->hasMany('Projects');
        $this->addBehavior('Timestamp');
    }
    
    public function validationDefault(Validator $validator) {
        $validator
            ->add('name', [
	            	'unique' => [
	            		'rule' => ['validateUnique', ['scope' => 'name']],
	            		'provider' => 'table',
	            		'message' => 'There is already a client with that name!'
	            	]
	            ])
            ->notEmpty('name')
            ->notEmpty('website')
            ->notEmpty('contactname')
            ->notEmpty('contactnum');
        return $validator;
    }
    
}
