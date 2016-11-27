<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
		$("#PrestadorTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#PrestadorTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#PrestadorTelefone1').blur(function() {
		  if ($('#PrestadorTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#PrestadorTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#PrestadorTelefone2').blur(function() {
		  if ($("#PrestadorTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#PrestadorTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});	  
  });
</script>

<div class="container prestadors form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar prestador de serviço em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('Prestador', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('bloco', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Insira os dados de um prestador', 'required' => 'true'));?>
					<hr style="border-bottom: 1px solid #ddd">
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('apelido', array('class' => 'form-control', 'placeholder' => 'Apelido'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('especialidade', array('class' => 'form-control', 'placeholder' => 'Especialidade'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var bloco = document.getElementById("PrestadorBloco");
	var nome = document.getElementById("PrestadorNome");
	var apelido = document.getElementById("PrestadorApelido");
	var especialidade = document.getElementById("PrestadorEspecialidade");
	var telefone1 = document.getElementById("PrestadorTelefone1");
	var telefone2 = document.getElementById("PrestadorTelefone2");

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
		if (bloco.value.substring(0, lines[0]).includes("–")) {
			nome.value = bloco.value.substring(0, bloco.value.indexOf("–")-1);
			apelido.value = bloco.value.substring(bloco.value.indexOf("–")+2, lines[0]);
		} else if (bloco.value.substring(0, lines[0]).includes("-")) {
			nome.value = bloco.value.substring(0, bloco.value.indexOf("-")-1);
			apelido.value = bloco.value.substring(bloco.value.indexOf("-")+2, lines[0]);
		} else {
			nome.value = bloco.value.substring(0, lines[0]);			
		}
		
		especialidade.value = bloco.value.substring(lines[0]+1, lines[1]);
		
		if (bars.length == 0) {
			telefone1.value = bloco.value.substring(lines[1]+1, lines[2]);
		} else{
			telefone1.value = bloco.value.substring(lines[1]+1, bars[0]);
			telefone2.value = bloco.value.substring(bars[0]+2, lines[2]);				
		}			
	}
</script>