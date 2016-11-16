<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container exvereadors form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Adicionar Vereadores ao longo dos anos'); ?></h1>
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
			<?php echo $this->Form->create('Exvereador', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('ano_inicio', array('class' => 'form-control', 'label' => 'Ano Início', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ano_fim', array('class' => 'form-control', 'label' => 'Ano Fim', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nomes', array('class' => 'form-control', 'placeholder' => 'Nomes', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>