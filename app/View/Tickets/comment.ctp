<!-- File: /app/View/Tickets/comment.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->
<?
$this->assign('title', 'Comment on Ticket');
?>
<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('Comment', array('role' => 'form'));
echo $this->Form->input('comment', array('div' => 'form-group', 'class' => 'form-control', 'label' => array('text' => 'Comment')));
echo $this->Form->end(array('label' => 'Add Comment', 'class' => "btn btn-default"));
?>