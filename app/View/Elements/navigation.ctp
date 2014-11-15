<li class="<?php echo ((!empty($this->params['controller']) && ($this->params['controller'] == 'users')) && ((!empty($this->params['action'])) && ($this->params['action']!= 'login'))) ? 'active' : 'inactive' ?>">
    <? echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
</li>

<li class="dropdown <?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'tickets')) ? 'active' : 'inactive' ?>">
    <a href="tickets/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Tickets <span class="caret"></span></a>
    <? //echo $this->Html->link('Tickets', array('controller' => 'tickets', 'action' => 'index')); ?>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Open</a></li>
        <li><a href="##">Deleted</a></li>
    </ul>
</li>

<li  class="<?php echo (!empty($this->params['action'])) && ($this->params['action']== 'login') ? 'active' : 'inactive' ?>">
    <?
    echo $this->Html->link((isset($userID)) ? "Logout" : "Login", array('controller' => 'users', 'action' => 'logout'));
    ?>
</li>