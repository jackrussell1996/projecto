<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        echo $this->Html->meta('icon', '/img/favicon.png');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-switch.min');
        echo $this->Html->css('bootstrap-datepicker3.min');
        echo $this->Html->css('custom');
        echo $this->Html->script('jquery-2.1.4.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-switch.min');
        echo $this->Html->script('bootstrap-datepicker.min');
        echo $this->Html->script('custom');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Projecto</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo $this->Html->link('Dashboard', '/dashboard'); ?></li>
                        <li><?php echo $this->Html->link('Clients', '/clients'); ?></li>
                        <li><?php echo $this->Html->link('Projects', '/projects'); ?></li>
                        <li><?php echo $this->Html->link('Jobs', '/jobs'); ?></li>
                        <li><?php echo $this->Html->link('Users', '/users'); ?></li>
                        <li><?php
                        if(!$auth){
                            echo $this->Html->link('Login', '/login'); 
                        } else{
                            echo $this->Html->link('Logout', '/logout'); 
                        }
                        ?></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
                    <h1 class="page-header"><?php
                    
                        echo $this->Html->link(ucfirst($this->request['controller']), '/' . $this->request['controller']);
                        echo " > ";
                        echo $this->Html->link(ucfirst($this->request['action']), '#');
                        ?></h1>
                    <?= $this->Flash->render() ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </body>
</html>
