<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){ 
		$("#SocialHorarioIni").mask("99:99",{autoclear: false});  	
		$("#SocialHorarioFim").mask("99:99",{autoclear: false});  	 	  
  });
</script>

<div class="container socials form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar Assistência'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Assistência'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Assistência'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Social.id'), $cidade['Cidade']['id']), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Social.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Social', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descrição'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('horario_ini', array('class' => 'form-control', 'label' => 'Abre às:'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('horario_fim', array('class' => 'form-control', 'label' => 'Fecha às:'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Foto'));?>
					<p><?php if ($this->data['Social']['foto'] != null) {
						echo $this->data['Social']['foto'];
					} else {
						echo "Sem foto";
					}	?>						
					</p>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
