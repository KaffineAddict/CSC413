<!-- File: /app/View/Tickets/index.ctp -->
<!--
This file is the main view for the Tickets page.
It loops through all tickets defined in app/Models/Ticket.php and writes the relevant
information to an html table.
-->

<h1>Ticket Queue</h1>

<!-- print out the top navigation using cake php array links -->
<?php echo $this->Html->link(
    'Create Ticket',
    array('controller' => 'tickets', 'action' => 'create')
);
echo " ";
echo $this->Html->link(
    'View/Add Users',
    array('controller' => 'users', 'action' => 'index')
); ?>

<!-- print out the table headers -->
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Creator</th>
        <th>Assignee</th>
        <th>Opened</th>
        <th>Status</th>
        <th>Update</th>
    </tr>
    <!-- begin for loop dumping out the ticket information -->
    <?php foreach($tickets as $ticket): ?>
    <tr>
        <td><?php echo $ticket['Ticket']['id']; ?></td>
        <td><?php echo $this->Html->link($ticket['Ticket']['description'], array('controller' => 'tickets',
                'action' => 'view', $ticket['Ticket']['id'])); ?></td>
        <td><?php echo $ticket['Creator']['full_name']; ?></td>
        <td><?php echo $ticket['Assignee']['full_name']; ?></td>
        <td><?php echo $ticket['Ticket']['created']; ?></td>
        <td><?php echo $ticket['Status']['name']; ?></td>
        <td><?php echo $this->Html->link('Update Ticket', array('action' => 'update', $ticket['Ticket']['id'])); ?></td>
    </tr>
    <!-- end for loop -->
    <?php endforeach; unset($ticket); ?>
</table>