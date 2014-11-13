<li class="<?php echo ((!empty($this->params['controller']) && ($this->params['controller'] == 'users')) && ((!empty($this->params['action'])) && ($this->params['action']!= 'login'))) ? 'active' : 'inactive' ?>">
    <? echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
</li>
<li class="<?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'tickets')) ? 'active' : 'inactive' ?>">
    <? echo $this->Html->link('Tickets', array('controller' => 'tickets', 'action' => 'index')); ?>
</li>
<li  class="<?php echo (!empty($this->params['action'])) && ($this->params['action']== 'login') ? 'active' : 'inactive' ?>">
    <?
    echo $this->Html->link((isset($userID)) ? "Logout" : "Login", array('controller' => 'users', 'action' => 'logout'));
    ?>
</li>
