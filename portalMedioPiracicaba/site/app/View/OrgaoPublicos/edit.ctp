<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#OrgaoPublicoTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#OrgaoPublicoTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#OrgaoPublicoTelefone1').blur(function() {
		  if ($('#OrgaoPublicoTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoPublicoTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#OrgaoPublicoTelefone2').blur(function() {
		  if ($("#OrgaoPublicoTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoPublicoTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container orgaoPublicos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar órgão público'); ?></h2>
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
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Órgão'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Órgãos'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('OrgaoPublico.id'), $cidade['Cidade']['id']), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('OrgaoPublico.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('OrgaoPublico', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
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
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
