<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container politicos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>
				<?php 
				if ($tipo == 1) {
					echo __('Adicionar Prefeito'); 
				} else {
					echo __('Adicionar Vereador'); 
				}
				?>					
				</h1>
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
			<?php echo $this->Form->create('Politico', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('partido', array('class' => 'form-control', 'placeholder' => 'Partido'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->radio('tipo', $tipos, array('legend' => '', 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('comissao_id', array('class' => 'form-control', 'label' => 'Faz parte de Comissão?', 'empty' => 'Não'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mesadiretora_id', array('class' => 'form-control', 'label' => 'Faz parte de Mesa Diretora?', 'empty' => 'Não'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
