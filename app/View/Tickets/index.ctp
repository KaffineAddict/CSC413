<!-- File: /app/View/Tickets/index.ctp -->
<!--
This file is the main view for the Tickets page.
It loops through all tickets defined in app/Models/Ticket.php and writes the relevant
information to an html table.
-->
<?
$this->assign('title', 'Ticket Queue');
?>
<!-- print out the table headers -->
<table class="table table-hover table-striped">
    <thead><tr>
        <th>ID</th>
        <th>Title</th>
        <th>Creator</th>
        <th>Assignee</th>
        <th>Opened</th>
        <th>Status</th>
        <th>Update</th>
    </tr></thead>
    <!-- begin for loop dumping out the ticket information -->
    <tbody>
    <?php foreach($tickets as $ticket): ?>
    <tr>
        <td><?php echo $ticket['Ticket']['id']; ?></td>
        <td><?php echo $this->Html->link($ticket['Ticket']['description'], array('controller' => 'tickets',
                'action' => 'view', $ticket['Ticket']['id'])); ?></td>
        <td><?php echo $ticket['Creator']['full_name']; ?></td>
        <td><?php echo $ticket['Assignee']['full_name']; ?></td>
        <td><?php echo $ticket['Ticket']['created']; ?></td>
        <td><?php echo $ticket['Status']['name']; ?></td>
        <td><?php
            echo $this->Html->link(
                'Update',
                array(
                    'controller' => 'tickets',
                    'action' => 'update', $ticket['Ticket']['id']),
                array(
                    'class' => 'btn btn-default'));
        ?></td>
    </tr>
    <?php endforeach; unset($ticket); ?>
    </tbody>
</table>