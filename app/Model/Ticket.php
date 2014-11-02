<?php

/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 11:39 AM
 *
 * This file contains the Model of the Ticket object to be used when pulling information from the database and when
 * submitting forms with user information
 */

class Ticket extends AppModel {
    // this belongs to links a ticket to a creator, assignee and a status
    // it allows us to display names instead of id's for the status and users
    // associated with the ticket.
    public $belongsTo = array(
        'Creator' => array(
            'className' => 'User',
            'foreignKey' => 'created_user_id'
        ),
        'Assignee' => array(
            'className' => 'User',
            'foreignKey' => 'assigned_user_id'
        ),
        'Status' => array(
            'className' => 'Status',
            'foreignKey' => 'status'
        )
    );

    // more validation code to cut down on inserting invalid data
    public $validate = array(
        'description' => array(
            'description_rule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'The description cannot be empty'
            ),
            'description_rule-2' => array(
                'rule' => array('maxLength', 128),
                'message' => 'The description needs to be less then 128 characters'
            )
        ),
        'created_user_id' => array(
            'created_user_id_rule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a creator ID'
            ),
            'created_user_id_rule-2' => array(
                'rule' => 'numeric',
                'message' => 'The creator ID must be numeric'
            ),
            'created_user_id_rule-3' => array(
                'rule' => array('maxLength', 10),
                'message' => 'The user ID is out of bounds.'
            )
        ),
        'assigned_user_id' => array(
                'assigned_user_id_rule-1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter an assignee ID'
                ),
                'assigned_user_id_rule-2' => array(
                    'rule' => 'numeric',
                    'message' => 'The assignee ID must be numeric'
                ),
                'assigned_user_id_rule-3' => array(
                'rule' => array('maxLength', 10),
                'message' => 'The user ID is out of bounds.'
                )
        ),
        'status' => array(
            'status_rule-1' => array(
                'rule' => array('maxLength', 4),
                'message' => 'Unknown status selected'
            ),
            'status_rule-2' => array(
                'rule' => 'numeric',
                'message' => 'The status must be numeric'
            )
        )
    );
} // end class ticket