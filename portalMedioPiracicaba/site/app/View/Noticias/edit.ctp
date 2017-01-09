<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container noticias form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Editar'); ?></h2>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes'), array('action' => 'view', $id, $tipo), array('escape' => false)); ?> </li>
								<li>
									<?php 
									 if ($tipo < 4 || $tipo > 5) {
										echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Notícias'), array('action' => 'index', $tipo), array('escape' => false)); 				 	
									 } else if ($tipo == 4) {
									 	echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Resumos'), array('action' => 'index', $tipo), array('escape' => false)); 				 	
									 } else if ($tipo == 5) {
									 	echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Horóscopo'), array('action' => 'index', $tipo), array('escape' => false)); 				 	
									 }
									?>
								</li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Noticia.id'), $tipo), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Noticia.id'))); ?></li>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Noticia', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('titulo', array('class' => 'form-control', 'placeholder' => 'Título', 'label' => 'Título', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Noticia.descricao', $options = array(), $tinyoptions = array(), $preset = null); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Foto'));?>
				</div>
				<?php if ($tipo == 4 || $tipo == 6): ?>
					<div class="form-group">
						<?php echo $this->Tinymce->input('Noticia.descricao1', $options = array('label' => 'Descrição 2'), $tinyoptions = array(), $preset = null) ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('foto1', array('class' => 'form', 'label' => 'Foto 2', 'type' => 'file'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Tinymce->input('Noticia.descricao2', $options = array('label' => 'Descrição 3'), $tinyoptions = array(), $preset = null) ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('foto2', array('class' => 'form', 'label' => 'Foto 3', 'type' => 'file'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Tinymce->input('Noticia.descricao3', $options = array('label' => 'Descrição 4'), $tinyoptions = array(), $preset = null) ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('foto3', array('class' => 'form', 'label' => 'Foto 4', 'type' => 'file'));?>
					</div>				
				<?php endif; ?>
				<div class="form-group">
					<?php echo $this->Form->input('link', array('class' => 'form-control', 'placeholder' => 'Link'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
