<!-- File: /app/View/Tickets/add.ctp -->

<h1>Create a Ticket</h1>
<?php
echo $this->Form->create('Ticket');
echo $this->Form->input('description');
echo $this->Form->input('created_user_id');
echo $this->Form->input('assigned_user_id');
echo $this->Form->input('status');
echo $this->Form->end('Create');
?>