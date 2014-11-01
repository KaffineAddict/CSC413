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
}