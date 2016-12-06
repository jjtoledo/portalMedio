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
				<h2><?php echo __('Adicionar evento em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('Evento', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('titulo', array('class' => 'form-control', 'placeholder' => 'Título', 'label' => 'Título', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descrição', 'label' => 'Descrição', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('local', array('class' => 'form-control', 'placeholder' => 'Local', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<label for="EventoHorario">Horário</label>
					<input id="EventoHorario" class="form-control" name="data[Evento][horario]"></input>
				</div>
				<div class="form-group">
					<label for="EventoData">Data</label>
					<input id="EventoData" class="form-control" name="data[Evento][data]"></input>
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
