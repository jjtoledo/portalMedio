<div id="modalSair" class="modal fade" role="dialog">
	<div class="modal-dialog">
 		<div class="modal-content">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal">&times;</button>
   			<h4 class="modal-title">Atenção</h4>
 		  </div>
  		<div class="modal-body">
    		<p>Tem certeza que quer sair?</p>
  		</div>
    	<div class="modal-footer">
      	<?php
            echo $this->Html->link(__('Sim'), 
              array('controller' => 'admins', 'action' => 'logout'), 
              array('escape' => false, 'class' => 'btn btn-default'));
          ?>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
    	</div>
  	</div>
 	</div>
</div>