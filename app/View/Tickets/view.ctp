<!-- File: /app/View/Tickets/view.ctp -->
<!--
This file allows us to view a single tickets information. At this time it only displays
the tickets id and creators as well as the time it was created. This will be updated to
show the comments on the ticket as well.
-->
<?
$this->assign('title', 'Single Ticket View');
?>
<!-- print the table headers -->
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
    <!-- fill in the table -->
    <tbody><tr>
        <td><?php echo $ticket['Ticket']['id']; ?></td>
        <td><?php echo $this->Html->link($ticket['Ticket']['description'], array('controller' => 'tickets',
                'action' => 'view', $ticket['Ticket']['id'])); ?></td>
        <td><?php echo $ticket['Creator']['full_name']; ?></td>
        <td><?php echo $ticket['Assignee']['full_name']; ?></td>
        <td><?php echo $ticket['Ticket']['created']; ?></td>
        <td><?php echo $ticket['Status']['name']; ?></td>
        <td><?php echo $this->Html->link('Update Ticket', array('action' => 'update', $ticket['Ticket']['id'])); ?></td>
    </tr></tbody>
</table>
    <br>
    <hr>
    <br>

<? echo $this->Html->link(
    'Add Comment',
    array(
        'controller' => 'tickets',
        'action' => 'comment', $ticket['Ticket']['id']),
    array(
        'class' => 'btn btn-default'));

    if(!empty($comments)) { ?>
    <table class="table table-hover table-striped">
    <thead><tr>
        <th>Name</th>
        <th>Comment</th>
        <th>Time</th>
    </tr></thead>
    <tbody>
    <?
        foreach($comments as $comment) {
            echo "<tr><td>" . $comment['Creator']['first_name'] . "</td>";
            echo "<td>" . $comment['Comment']['comment'] . "</td>";
            echo "<td>" . $comment['Comment']['timestamp'] . "</td></tr>";
        }
        unset($comment);
    echo "</tbody>";
    } else {
        echo "There are no comments";
    } ?>
    </table>