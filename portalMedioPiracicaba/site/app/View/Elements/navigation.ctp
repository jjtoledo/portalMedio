<div class="navbar navbar-transparente navbar-fixed-top opaque-navbar">
  <div class="container lessPad">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <?php 
      echo $this->Html->link(
              $this->Html->image('logo_hib.png', array('class' => 'img-responsive navbar-img imgconfig')), 
                            array('controller' => 'homes', 'action' => 'index'), 
                            array('escape' => false)); 
      ?>
    </div>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="nav navbar-nav">
        <li><a href="#">Início</a></li>
        <li><a href="#">Cidades</a></li>
        <li><a href="#">Contato</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php
            echo $this->Html->link(__(
              '<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login'), 
              array('controller' => 'admins', 'action' => 'index_login'), 
              array('escape' => false));
          ?>
        </li>
      </ul>
    </div>
  </div>
</div>