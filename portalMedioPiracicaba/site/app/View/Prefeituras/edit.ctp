<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container populacaos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar prefeitura em ' . $cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes Prefeitura'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>												
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $id), array('escape' => false)); ?> </li>												
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Prefeitura', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id');?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descrição', 'label' => 'Descrição'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('endereco', array('class' => 'form-control', 'placeholder' => 'Endereço', 'label' => 'Endereço'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'label' => 'Telefone 1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'label' => 'Telefone 2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('class' => 'form-', 'label' => 'Foto', 'type' => 'file'));?>
					<p><?php if ($this->data['Prefeitura']['foto'] != null) {
						echo $this->data['Prefeitura']['foto'];
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
