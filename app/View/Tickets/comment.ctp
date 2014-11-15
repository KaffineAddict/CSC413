<!-- File: /app/View/Tickets/comment.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->
<?
$this->assign('title', 'Comment on Ticket');
?>
<!-- a link back to the main ticket view -->
<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('Comment');
echo $this->Form->input('comment');
echo $this->Form->end('Update Status');
?>