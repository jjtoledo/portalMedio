<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#OrgaoSaudeTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#OrgaoSaudeTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#OrgaoSaudeTelefone1').blur(function() {
		  if ($('#OrgaoSaudeTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoSaudeTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#OrgaoSaudeTelefone2').blur(function() {
		  if ($("#OrgaoSaudeTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#OrgaoSaudeTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container orgaoSaudes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar órgão de saúde em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('OrgaoSaude', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('bloco', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Insira os dados de um órgão de saúde', 'required' => 'true'));?>
					<hr style="border-bottom: 1px solid #ddd">
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('localizacao', array('class' => 'form-control', 'placeholder' => 'Localização', 'label' => 'Localização'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone principal'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone secundário'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('site', array('class' => 'form-control', 'placeholder' => 'Site'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto_anuncio', array('label' => 'Foto Anúncio', 'type' => 'file'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var bloco = document.getElementById("OrgaoSaudeBloco");
	var nome = document.getElementById("OrgaoSaudeNome");
	var tipo = document.getElementById("OrgaoSaudeTipo");
	var localizacao = document.getElementById("OrgaoSaudeLocalizacao");
	var telefone1 = document.getElementById("OrgaoSaudeTelefone1");
	var telefone2 = document.getElementById("OrgaoSaudeTelefone2");
	var site = document.getElementById("OrgaoSaudeSite");

	bloco.addEventListener("blur", myFunction);
	function myFunction() {
		var lines = [];
		var bars = [];
		for (var i = 0; i < bloco.value.length; i++) {
			if (bloco.value[i] == "\n") {
				lines.push(i);
			} 

			if (bloco.value[i] == "/") {
				bars.push(i);
			} 
		}
		nome.value = bloco.value.substring(0, lines[0]);
		tipo.value = bloco.value.substring(lines[0]+1, lines[1]);

		if (bloco.value.substring(lines[1]+1, lines[1]+10).toLowerCase().includes("rua") || bloco.value.substring(lines[1]+1, lines[1]+10).toLowerCase().includes("avenida")) {
			localizacao.value = bloco.value.substring(lines[1]+1, lines[2]);

			if (bars.length == 0) {
				telefone1.value = bloco.value.substring(lines[2]+1, lines[3]);
			} else{
				telefone1.value = bloco.value.substring(lines[2]+1, bars[0]);
				telefone2.value = bloco.value.substring(bars[0]+2, lines[3]);				
			}			

			site.value = bloco.value.substring(lines[3]+1, lines[4]);
		} else {						
			if (bars.length == 0) {
				telefone1.value = bloco.value.substring(lines[1]+1, lines[2]);
			} else{
				telefone1.value = bloco.value.substring(lines[1]+1, bars[0]);
				telefone2.value = bloco.value.substring(bars[0]+2, lines[2]);				
			}	

			site.value = bloco.value.substring(lines[2]+1, lines[3]);
		}
	}
</script>