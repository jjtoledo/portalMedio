<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container" style="padding: 0px">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navAdmin">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <?php
        echo $this->Html->link(__(
                'PortalMedio'), 
                array('controller' => 'homes', 'action' => 'index'), 
                array('escape' => false, 'class' => 'navbar-brand'));
      ?>
    </div>
  </div>
</div>