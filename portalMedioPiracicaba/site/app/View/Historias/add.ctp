<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container historias form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Dados históricos de ' . $cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $id), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Historia', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Tinymce->input('Historia.historia', $options = array(), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('adocao_nome', array('class' => 'form-control', 'placeholder' => 'Adoção Nome' , 'label' => 'Adoção Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('emancipacao', array('class' => 'form-control', 'placeholder' => 'Emancipação', 'label' => 'Emancipação'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('adjetivo_patrio', array('class' => 'form-control', 'placeholder' => 'Adjetivo Pátrio', 'label' => 'Adjetivo Pátrio'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('class' => 'form-', 'type' => 'file', 'label' => 'Foto Histórica'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
