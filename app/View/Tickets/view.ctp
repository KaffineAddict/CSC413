<!-- File: /app/View/Tickets/view.ctp -->
<!--
This file allows us to view a single tickets information. At this time it only displays
the tickets id and creators as well as the time it was created. This will be updated to
show the comments on the ticket as well.
-->

<h1>Single Ticket View</h1>

<!-- a link to show all of the tickets -->
<?php echo $this->Html->link(
    'Show All Tickets',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<!-- print the table headers -->
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
    <!-- fill in the table -->
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
    <br>
    <hr>
    <br>
    <table>
        <tr>
            <th>Name</th>
            <th>Comment</th>
            <th>Time</th>
        </tr>
    <? foreach($comments as $comment): ?>
        <tr>
            <td><?=$comment['Creator']['first_name'];?></td>
            <td><?=$comment['Comment']['comment'];?></td>
            <td><?=$comment['Comment']['timestamp'];?></td>
        </tr>
    <? endforeach; unset($comment); ?>
    </table>