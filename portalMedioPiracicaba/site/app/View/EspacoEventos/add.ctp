<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#EspacoEventoTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#EspacoEventoTelefone2").mask("(99)99999-9999",{autoclear: false});  	

		$('#EspacoEventoTelefone1').blur(function() {
		  if ($('#EspacoEventoTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#EspacoEventoTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#EspacoEventoTelefone2').blur(function() {
		  if ($("#EspacoEventoTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#EspacoEventoTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container espacoEventos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar'); ?></h2>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('EspacoEvento', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descrição', 'label' => 'Descrição'));?>
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
