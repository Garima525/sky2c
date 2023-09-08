<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ShippingCarriersTable extends Table
{   
      
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    } 
    public function validationDefault(Validator $validator)
    {
         $validator
            ->notEmpty('carrier_name', 'Name field is required')
            ->notEmpty('phone', __('Phone field is required'))
            ->add('phone', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'This phone already in use'
                ]
            ])
            ->add('phone',[
                    'numericCheck'=>[
                    'rule'=>'numericCheck',
                    'provider'=>'table',
                    'message'=>'Please enter the numeric value only.'
                     ]
            ])
            ->add('phone', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'Please enter at least 10 characters.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'message' => 'Please enter no more than 10 characters.'
                ]
            ]);
           
           return $validator;
    }
    public function numericCheck($value,$context){
         $output = is_numeric($context['data']['phone']);
        if($output) {
            return true;
        } else {
            return false;
        }
    }
}
?>
