<!-- File: /app/View/Posts/update.ctp -->

<h1>Update Ticket</h1>
<?php
echo $this->Form->create('Ticket');
echo $this->Form->input('description');
echo $this->Form->input('created_user_id');
echo $this->Form->input('assigned_user_id');
echo $this->Form->input('status');
echo $this->Form->end('Update Status');
?>