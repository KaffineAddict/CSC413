<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
    echo $this->Html->script('bootstrap');
	echo $this->Html->css('bootstrap');
    echo $this->Html->css('custom');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/tickets">Ticketer <span class="glyphicon glyphicon-tag" aria-hidden="true"></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
            <ul class="nav navbar-nav">
                <? echo $this->element('navigation'); ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

	<div id="container" class="container content">
		<div id="header">
            <? if($this->Session->check('Message.flash')) {
                echo "<div class=\"alert alert-info\" role=\"alert\">";
                echo $this->Session->flash();
                echo "</div>";
            }
            ?>
		</div>
		<div id="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><?php echo $this->fetch('title'); ?></h2>
                </div>
                <div class="panel-body">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
		</div>
		<div id="footer">

		</div>
	</div>
</body>
</html>
