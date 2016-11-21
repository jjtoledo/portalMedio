<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#EscolaTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#EscolaTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#EscolaTelefone1').blur(function() {
		  if ($('#EscolaTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#EscolaTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#EscolaTelefone2').blur(function() {
		  if ($("#EscolaTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#EscolaTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container escolas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if ($tipo < 3 || $tipo > 4) { ?>
					<h2><?php echo __('Adicionar escola em ' . $cidade['Cidade']['nome']); ?></h2>
				<?php } else { ?>
					<h2><?php echo __('Adicionar faculdade em ' . $cidade['Cidade']['nome']); ?></h2>
				<?php } ?>
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
								<?php if ($tipo < 3 || $tipo > 4) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'index_fac', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Escola', array('role' => 'form', 'type' => 'file')); ?>

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
					<?php 
							if ($tipo == 3) {
								echo $this->Form->input(
								    'tipo',
								    array('options' => $tipos, 'empty' => 'Selecione um tipo', 'required' => 'true',
								    			'class' => 'form-control'
								    )
								);
							}
					?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone', 'label' => 'Telefone principal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone', 'label' => 'Telefone opcional'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('site', array('class' => 'form-control', 'placeholder' => 'Site'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto_anuncio', array('type' => 'file', 'label' => 'Foto Anúncio'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
