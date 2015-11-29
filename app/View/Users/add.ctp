<!-- File: /app/View/Users/add.ctp -->
<!--
This is a form that allows us to add a new user
-->
<?
$this->assign('title', 'Add a User');
?>
<?php
echo $this->Form->create('User', array('role' => 'form'));
echo $this->Form->input('first_name', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'First Name')));
echo $this->Form->input('last_name', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Last Name')));
echo $this->Form->input('email', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Email')));
echo $this->Form->input('token', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'User Token')));
echo $this->Form->input('user_type', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'User Type')));
echo $this->Form->end(array('label' => 'Add User', 'class' => "btn btn-default"));
?>