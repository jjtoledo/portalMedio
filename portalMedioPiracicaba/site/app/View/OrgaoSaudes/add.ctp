<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#OrgaoSaudeTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#OrgaoSaudeTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#OrgaoSaudeTelefone1').blur(function() {
		  if ($('#OrgaoSaudeTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoSaudeTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#OrgaoSaudeTelefone2').blur(function() {
		  if ($("#OrgaoSaudeTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoSaudeTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container orgaoSaudes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar órgão de saúde em ' . $cidade['Cidade']['nome']); ?></h2>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('OrgaoSaude', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('localizacao', array('class' => 'form-control', 'placeholder' => 'Localização', 'label' => 'Localização'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone principal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone secundário'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('site', array('class' => 'form-control', 'placeholder' => 'Site'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto_anuncio', array('label' => 'Foto Anúncio', 'type' => 'file'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
