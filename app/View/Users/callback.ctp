<h2>GitHub</h2>
<?php
echo $this->Form->create('User', array('type' => 'post', 'action' => 'login'));
echo $this->Form->hidden('GitHub.login', array('label' => false,'value' => '1'));
echo $this->Form->submit("Login with GitHub",array('label' => false));
echo $this->Form->end();
?>