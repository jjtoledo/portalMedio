<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script>	

jQuery(function($){	
  $('#EventoData').mask("99/99/9999"); 
  $('#EventoHorario').mask("99:99"); 
});

</script>

<div class="container eventos form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar evento'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Evento'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Eventos'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Evento.id'), $cidade['Cidade']['id']), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Evento.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Evento', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('titulo', array('class' => 'form-control', 'placeholder' => 'Título', 'label' => 'Título', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Evento.descricao', $options = array(), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('local', array('class' => 'form-control', 'placeholder' => 'Local', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<div class="input text">
						<label for="EventoHorario">Horário</label>
						<?php echo '<input id="EventoHorario" class="form-control" name="data[Evento][horario]" type="text" value="'.$evento['Evento']['horario'].'"></input>' ?>
					</div>
				</div>
				<div class="form-group">
					<label for="EventoData">Data</label>
					<?php echo '<input id="EventoData" class="form-control" name="data[Evento][data]" type="text" value="'.$evento['Evento']['data'].'"></input>' ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto_anuncio', array('type' => 'file', 'label' => 'Foto Anúncio'));?>					
					<p><?php if ($this->data['Evento']['foto_anuncio'] != null) {
						echo $this->data['Evento']['foto_anuncio'];
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
