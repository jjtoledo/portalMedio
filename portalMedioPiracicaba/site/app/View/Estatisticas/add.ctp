<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container estatisticas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Dados estatísticos de ' . $cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $id), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Estatistica', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('area_territorial', array('class' => 'form-control', 'placeholder' => 'Área Territorial', 'label' => 'Área Territorial'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('micro_regiao', array('class' => 'form-control', 'placeholder' => 'Micro Região', 'label' => 'Micro Região'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('eleitores', array('class' => 'form-control', 'placeholder' => 'Eleitores', 'min' => 0, 'max' => 100000000));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('secoes', array('class' => 'form-control', 'placeholder' => 'Seções', 'min' => 0, 'label' => 'Seções Eleitorais'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('indice_pluviometrico', array('class' => 'form-control', 'placeholder' => 'Índice Pluviométrico', 'min' => 0, 'label' => 'Índice Pluviométrico'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('altitude_max', array('class' => 'form-control', 'placeholder' => 'Altitude Máxima', 'min' => 0, 'label' => 'Altitude Máxima'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('altitude_min', array('class' => 'form-control', 'placeholder' => 'Altitude Mínima' , 'min' => 0, 'label' => 'Altitude Mínima'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('altitude_centro', array('class' => 'form-control', 'placeholder' => 'Altitude Centro', 'min' => 0));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('relevo_plano', array('class' => 'form-control', 'placeholder' => 'Relevo Plano', 'min' => 0, 'max' => 100));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('relevo_ondulado', array('class' => 'form-control', 'placeholder' => 'Relevo Ondulado', 'min' => 0, 'max' => 100));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('relevo_montanhoso', array('class' => 'form-control', 'placeholder' => 'Relevo Montanhoso', 'min' => 0, 'max' => 100));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('clima', array('class' => 'form-control', 'placeholder' => 'Clima'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('temp_anual', array('class' => 'form-control', 'placeholder' => 'Temperatura Anual', 'min' => 0));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('temp_max', array('class' => 'form-control', 'placeholder' => 'Temperatura Máxima', 'min' => 0, 'label' => 'Temperatura Máxima'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('temp_min', array('class' => 'form-control', 'placeholder' => 'Temperatura Mínima', 'min' => -20, 'label' => 'Temperatura Mínima'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Estatistica.limitrofes', $options = array('label' => 'Municípios Limítrofes'), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Estatistica.centros', $options = array('label' => 'Distância principais Centros'), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Estatistica.vias', $options = array('label' => 'Vias de Acesso'), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
