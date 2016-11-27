<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container onibusRotas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar Rota'); ?></h2>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Rota'), array('action' => 'view', $id, $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Rotas'), array('action' => 'index', $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('OnibusRota.id'), $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('OnibusRota.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('OnibusRota', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Ex: Intermunicipal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('rota', array('class' => 'form-control', 'placeholder' => 'Rota'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('frequencia', array('class' => 'form-control', 'placeholder' => "Ex: Diariamente: 18:00, 19:00\nDomingos e feriados: 12:00, 00:00"));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
