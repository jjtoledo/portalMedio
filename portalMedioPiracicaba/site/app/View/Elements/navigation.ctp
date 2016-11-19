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
        <li><?php echo $this->Html->link('Início', array('action' => 'index')) ?></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Cidades <span class="caret" style="color: white"></span>
          </a>
          <ul class="dropdown-menu white">
            <?php foreach ($cidades as $c) {
              echo '<li>'. $this->Html->link($c['Cidade']['nome'], array('action' => 'site_cidade', $c['Cidade']['id'])) .'</li>';
            } ?>
          </ul>
        </li>
        <li><?php echo $this->Html->link('Notícias Regionais', array('action' => 'site_noticias', 2)) ?></li>
        <li><?php echo $this->Html->link('Boas Notícias', array('action' => 'site_noticias', 3)) ?></li>
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