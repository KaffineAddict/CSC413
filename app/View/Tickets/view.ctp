<!-- File: /app/View/Tickets/view.ctp -->

<h1>Single Ticket View</h1>

<?php echo $this->Html->link(
    'Show All Tickets',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

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
</table>

