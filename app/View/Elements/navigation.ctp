<?
$param_controller = (isset($this->params['controller'])) ? $this->params['controller'] : "";
$param_action = (isset($this->params['action'])) ? $this->params['action'] : "";
?>

<li class="dropdown <?php echo (($param_controller == 'users') && ($param_action != 'login')) ? 'active' : 'inactive' ?>">
    <? echo $this->Html->link(
        'Users',
        array(
            'controller' => 'users',
            'action' => 'index'),
        array(
            'class' => 'dropdown-toggle',
            'role' => 'button',
            'data-toggle' => 'dropdown',
            'aria-expanded' => 'true')
    ); ?>
    <ul class="dropdown-menu" role="menu">
        <li><? echo $this->Html->link(
                'Profile',
                array(
                    'controller' => 'users',
                    'action' => 'update',
                    $userID)
            );
            ?></li>
    </ul>
</li>

<li class="dropdown <?php echo ($param_controller == 'tickets') ? 'active' : 'inactive' ?>">
    <? echo $this->Html->link(
        'Tickets',
        array(
            'controller' => 'tickets',
            'action' => 'index'),
        array(
            'class' => 'dropdown-toggle',
            'role' => 'button',
            'data-toggle' => 'dropdown',
            'aria-expanded' => 'true')
    ); ?>
    <ul class="dropdown-menu" role="menu">
        <li><? echo $this->Html->link(
                'Open',
                array(
                    'controller' => 'tickets',
                    'action' => 'index',
                    'open')
            ); ?></li>
        <li><? echo $this->Html->link(
                'Closed',
                array(
                    'controller' => 'tickets',
                    'action' => 'index',
                    'closed')
            ); ?></li>
    </ul>
</li>

<li  class="<?php echo ($param_action == 'login') ? 'active' : 'inactive' ?>">
    <?
    echo $this->Html->link((isset($userID)) ? "Logout" : "Login", array('controller' => 'users', 'action' => 'logout'));
    ?>
</li>