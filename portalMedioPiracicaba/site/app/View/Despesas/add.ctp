<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container despesas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar despesa em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('Despesa', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('ano', array('class' => 'form-control', 'placeholder' => 'Ano', 'min' => 0));?>
				</div>
				
				<div class="form-group">
					<?php echo $this->Form->input('desp1', array('class' => 'form-control', 'label' => 'Despesa 1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp2', array('class' => 'form-control', 'label' => 'Despesa 2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp3', array('class' => 'form-control', 'label' => 'Despesa 3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp4', array('class' => 'form-control', 'label' => 'Despesa 4'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp5', array('class' => 'form-control', 'label' => 'Despesa 5'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp6', array('class' => 'form-control', 'label' => 'Despesa 6'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp7', array('class' => 'form-control', 'label' => 'Despesa 7'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp8', array('class' => 'form-control', 'label' => 'Despesa 8'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp9', array('class' => 'form-control', 'label' => 'Despesa 9'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp10', array('class' => 'form-control', 'label' => 'Despesa 10'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp11', array('class' => 'form-control', 'label' => 'Despesa 11'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp12', array('class' => 'form-control', 'label' => 'Despesa 12'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp13', array('class' => 'form-control', 'label' => 'Despesa 13'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp14', array('class' => 'form-control', 'label' => 'Despesa 14'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp15', array('class' => 'form-control', 'label' => 'Despesa 15'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp16', array('class' => 'form-control', 'label' => 'Despesa 16'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp17', array('class' => 'form-control', 'label' => 'Despesa 17'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('desp18', array('class' => 'form-control', 'label' => 'Despesa 18'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('total', array('class' => 'form-control', 'placeholder' => 'Total', 'label' => 'Total'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
