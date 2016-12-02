<?php echo $this->Element('navigation_secondary'); ?>

<div class="container-fluid text-center">
	<div class='row'>
	  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
	  	<?php 
	  	echo '<p class="marginTop noticiasHome inverse more text-center">Contato</p>';
	  	?>
	  </div>
	</div>
</div>

<div class="container responsive-large">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-warning">
			  <div class="panel-heading" style="padding: 20px">
			    <h3 class="panel-title">Nos envie sugestões, críticas ou que quiser. Estamos sempre procurando melhorar!</h3>
			  </div>
			  <div class="panel-body" style="padding: 30px">			
		  		<?php echo $this->Form->create('Contato', array('role' => 'form')); ?>

						<div class="form-group col-md-10 col-md-offset-1">
							<?php echo $this->Form->input('nome', array('class' => 'form-control', 'label' => 'Nome *', 'placeholder' => 'Informe seu nome', 'required' => 'true'));?>
						</div>
						<div class="form-group col-md-10 col-md-offset-1">
							<?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email *', 'placeholder' => 'Informe seu email para futuro contato', 'required' => 'true'));?>
						</div>
						<div class="form-group col-md-10 col-md-offset-1">
							<?php echo $this->Form->input('assunto', array('class' => 'form-control', 'label' => 'Assunto *', 'placeholder' => 'ex: Sugestão'));?>
						</div>
						<div class="form-group col-md-10 col-md-offset-1">
							<?php echo $this->Form->input('mensagem', array('class' => 'form-control', 'label' => 'Mensagem *', 'type' => 'textarea'));?>
						</div>
						<div class="form-group col-md-10 col-md-offset-1">
							<?php echo $this->Form->button(__('Enviar <span class="glyphicon glyphicon-send"></span>'), array('type' => 'submit', 'escape' => false, 'class' => 'btn btn-warning')); ?>
						</div>

					<?php echo $this->Form->end() ?>
			  </div>
			</div>			
		</div>
	</div>
</div>

<?php echo $this->Element('footer'); ?>