<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/14/2014
 * Time: 8:36 PM
 */
class Comment extends AppModel
{
    public $belongsTo = array(
        'Creator' => array(
            'className' => 'User',
            'foreignKey' => 'commentor_id',
            'fields' => array('first_name')
        )
    );
}
