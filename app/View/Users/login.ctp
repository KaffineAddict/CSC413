<!-- File: /app/View/Users/login.ctp -->
<!--
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/7/2014
 * Time: 10:11 PM
 -->
<?
$this->assign('title', 'Please Login');
?>

<?php
echo "<span style='text-align: center;'>";
echo $this->Form->create('User', array('type' => 'post', 'action' => 'login'));
echo $this->Form->hidden('GitHub.login', array('label' => false,'value' => '1'));
echo $this->Form->submit("Login with GitHub",array('type'=>'image','src' => '/img/github.button.png', 'label' => false));
echo $this->Form->end();
echo "</span>";
?>