<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 2:43 PM
 *
 * This file contains the Model of the User object this is used when building forms and getting information
 * from the database.
 */

class User extends AppModel {
    // this constructor builds a column out of the first and last name
    // which saves joining these names together several times
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        // build the virtual column full_name
        $this->virtualFields['full_name'] = sprintf(
            'CONCAT(%s.first_name, " ", %s.last_name)', $this->alias, $this->alias
        );
    }
    // links to the tickets so we can easily get a list of all tickets authored
    // by this user
    public $hasMany = array(
        'Ticket' => array(
            'className' => 'Ticket',
            'foreignKey' => 'created_user_id'
        )
    );
    // Links this user to a user type in the accesses table
    public $belongsTo = array(
        'Type' => array(
            'className' => 'Access',
            'foreignKey' => 'user_type'
        )
    );
    // this is the validation to use when submitting a form for user creation
    // most of the information in here is to force the non-null fields to have
    // some information.
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
} // end class user