<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container politicos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2>
				<?php 
				if ($tipo == 1) {
					echo __('Adicionar Prefeito'); 
				} else {
					echo __('Adicionar Vereador'); 
				}
				?>					
				</h2>
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
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('partido', array('class' => 'form-control', 'placeholder' => 'Partido', 'required' => 'true'));?>
				</div>
				
				<div id="mesa" hidden="true">
					<div class="form-group">
						<label>Faz parte de Mesa Diretora?</label><br>
						<?php echo $this->Form->radio('mesa_diretora', array('0' => 'Não', '1' => 'Sim'), array('legend' => '', 'value' => '0', 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));?>
					</div>
				</div>
				
				<div id="presidente" hidden="true">
					<div class="form-group">
						<label>É presidente?</label><br>
						<?php echo $this->Form->radio('presidente', array('0' => 'Não', '1' => 'Sim'), array('legend' => '', 'value' => '0', 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));?>
					</div>
				</div>

				<div id="comissao" hidden="true">
					<div class="form-group">
						<?php echo $this->Form->input('comissao_id', array('class' => 'form-control', 'label' => 'Faz parte de Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var mesa       = document.getElementById('mesa');
	var mesaNao    = document.getElementById('PoliticoMesaDiretora0');
	var presidente = document.getElementById('presidente');
	var comissao   = document.getElementById('comissao');

	if (<?php echo $tipo ?> == 2) {
		mesa.removeAttribute('hidden');			
		comissao.removeAttribute('hidden');
	}

	mesa.addEventListener("change", function() {
		if (mesaNao.checked) {
			presidente.setAttribute('hidden', 'true');
		} else {
			presidente.removeAttribute('hidden');			
		}
	});
</script>