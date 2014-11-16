<!-- File: /app/View/Users/update.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->
<?
if($userID == $editing_id) {
    $this->assign('title', 'Update Profile');
} else {
    $this->assign('title', 'Update User');
}
?>
<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('User', array('role' => 'form'));
echo $this->Form->input('first_name', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'First Name')));
echo $this->Form->input('last_name', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Last Name')));
echo $this->Form->input('email', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'User Email')));
if (isset($can_update)) {
    echo $this->Form->input('user_type' , array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'User Type')));
}
echo $this->Form->end( array('label' => 'Update User', 'class' => "btn btn-default"));
?>