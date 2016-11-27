<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container onibusRotas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar rota na ' . $empresa_onibus['EmpresaOnibus']['nome']); ?></h2>
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
								<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'index', $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
							</ul>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('OnibusRota', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('bloco', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Insira os dados de uma rota', 'required' => 'true'));?>
					<hr style="border-bottom: 1px solid #ddd">
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Ex: Intermunicipal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('rota', array('class' => 'form-control', 'placeholder' => 'Ex: João Monlevade / Belo Horizonte'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('frequencia', array('class' => 'form-control', 'placeholder' => "Ex: Diariamente: 18:00, 19:00\nDomingos e feriados: 12:00, 00:00"));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var bloco = document.getElementById("OnibusRotaBloco");
	var rota = document.getElementById("OnibusRotaRota");
	var tipo = document.getElementById("OnibusRotaTipo");
	var frequencia = document.getElementById("OnibusRotaFrequencia");

	bloco.addEventListener("blur", myFunction);
	function myFunction() {
		var lines = [];
		var bars = [];
		for (var i = 0; i < bloco.value.length; i++) {
			if (bloco.value[i] == "\n") {
				lines.push(i);
			}
		}
		
		tipo.value = bloco.value.substring(0, lines[0]);
		rota.value = bloco.value.substring(lines[0]+1, lines[1]);
		frequencia.value = bloco.value.substring(lines[1]+1);
	}
</script>