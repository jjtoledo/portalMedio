<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#DocumentoHorarioIni").mask("99:99",{autoclear: false});  	
		$("#DocumentoHorarioFim").mask("99:99",{autoclear: false});  	  	
  });
</script>

<div class="container documentos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar documento'); ?></h2>
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
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Documento'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Documentos'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Documento.id'), $cidade['Cidade']['id']), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Documento.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Documento', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome do Local', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo_documento', array('class' => 'form-control', 'placeholder' => 'Tipo Documento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descrição'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('horario_ini', array('class' => 'form-control', 'label' => 'Abre às:'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('horario_fim', array('class' => 'form-control', 'label' => 'Fecha às:'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('localizacao', array('class' => 'form-control', 'placeholder' => 'Local'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto_anuncio', array('class' => '', 'type' => 'file', 'label' => 'Foto'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
