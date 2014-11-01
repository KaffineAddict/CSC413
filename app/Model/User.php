<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 2:43 PM
 */

class User extends AppModel {
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields['full_name'] = sprintf(
            'CONCAT(%s.first_name, " ", %s.last_name)', $this->alias, $this->alias
        );
    }
    public $hasMany = array(
        'Ticket' => array(
            'className' => 'Ticket',
            'foreignKey' => 'created_user_id'
        )
    );
    public $belongsTo = array(
        'Type' => array(
            'className' => 'Access',
            'foreignKey' => 'user_type'
        )
    );
    public $validate = array(
        'token' => array(
            'token_rule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'The token cannot be empty'
            )
        ),
        'first_name' => array(
            'token_rule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'The first name cannot be empty'
            )
        ),
        'email' => array(
            'token_rule-1' => array(
                'rule' => array('email', true),
                'message' => 'Must use a valid email'
            )
        )
    );
}