<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<title>
  		<?php echo $title_for_layout; ?>
  	</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


  	<!-- Latest compiled and minified JavaScript -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');   
    echo $this->Html->css('bootstrap.css');
    echo $this->Html->css('style.css');   
    echo $this->Html->css('parceiros.css'); 
    echo $this->Html->css('cards.css'); 
    echo $this->Html->script('script.js');
    echo $this->Html->script('jquery.maskedinput.js');
    echo $this->Html->script('endless_scroll_min.js');
  ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    	body{ padding: 0px 0px; }
    </style>
  </head>

  <body>

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

  <!--<footer  style="background-color:#FF6C3B">
    <nav>
    <h2>Navegue no site</h2>
    <ul>
    <li><a href="#">Home</a></li> 
    <li><a href="#">História das cidades</a></li>
    <li><a href="#">Seja um colaborarador</a></li>
    <li><a href="#">Quem somos</a></li>
    </ul>
    </nav>
    <nav>
    <h2>Fique conectado !</h2>
    <ul>
    <li><a href="#">Email</a></li>
    </ul>
    </nav>
    <small>Copyright © 2010 </small>
  </footer> -->
  
  </body>
</html>