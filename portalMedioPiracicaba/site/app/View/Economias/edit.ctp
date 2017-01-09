<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container economias form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Editar'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes'), array('action' => 'view', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Economia.id'), $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Economia.id'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Economia', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id');?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('subtitulo', array('class' => 'form-control', 'placeholder' => 'Subtitulo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Economia.descricao', $options = array(), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('type' => 'file', 'placeholder' => 'Foto'));?>
					<p><?php if ($this->data['Economia']['foto'] != null) {
						echo $this->data['Economia']['foto'];
					} else {
						echo "Sem foto";
					}	?>						
					</p>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
