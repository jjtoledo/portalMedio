<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container" style="padding: 0px">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navAdmin">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <a class="navbar-brand" href="#">PortalMedio</a>
    </div>
    <div class="collapse navbar-collapse" id="navAdmin">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php
            if ($this->Session->check('Admin')) {
              echo '<li><a data-toggle="modal" data-target="#modalSair">
                      <span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sair</a>
                    </li>';
            } else {
              echo $this->Html->link(__(
                '<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login'), 
                array('controller' => 'admins', 'action' => 'index_login'), 
                array('escape' => false));
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</div>