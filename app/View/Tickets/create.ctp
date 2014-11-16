<!-- File: /app/View/Tickets/create.ctp -->
<!--
This is a form that allows us to create a brand new ticket
-->
<?
$this->assign('title', 'Create a Ticket');
?>
<!-- build the ticket creation form -->
<?php
echo $this->Form->create('Ticket', array('role' => 'form'));
echo $this->Form->input('description', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Description')));
echo $this->Form->input('created_user_id', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Creator')));
echo $this->Form->input('assigned_user_id', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Assigned to')));
echo $this->Form->input('status', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Current Status')));
echo $this->Form->end(array('label' => 'Create', 'class' => "btn btn-default"));
?>