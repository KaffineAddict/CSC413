<!-- File: /app/View/Tickets/index.ctp -->

<h1>Ticket Queue</h1>

<?php echo $this->Html->link(
    'Create Ticket',
    array('controller' => 'tickets', 'action' => 'create')
);
echo " ";
echo $this->Html->link(
    'View/Add Users',
    array('controller' => 'users', 'action' => 'index')
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
    <?php endforeach; unset($ticket); ?>
</table>