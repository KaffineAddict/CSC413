<!-- File: /app/View/Tickets/update.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->
<?
$this->assign('title', 'Update Ticket');
?>
<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('Ticket', array('role' => 'form'));
echo $this->Form->input('description', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Description')));
echo $this->Form->input('created_user_id', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Creator')));
echo $this->Form->input('assigned_user_id', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Assigned to')));
echo $this->Form->input('status', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Current Status')));
echo $this->Form->end(array('label' => 'Update Status', 'class' => "btn btn-default"));
?>