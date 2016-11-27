<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script type="text/javascript">
	jQuery(function($){
	   $("#EnderecoCep").mask("99999-999");
	});
</script>

<div class="container enderecos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar endereço em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('Endereco', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('bloco', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Insira o bloco de um endereço'));?>
					<hr style="border-bottom: 1px solid #ddd">
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('rua', array('class' => 'form-control', 'placeholder' => 'Rua', 'label' => 'Rua', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'placeholder' => 'CEP', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro', 'label' => 'Bairro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var bloco = document.getElementById("EnderecoBloco");
	var rua = document.getElementById("EnderecoRua");
	var cep = document.getElementById("EnderecoCep");
	var bairro = document.getElementById("EnderecoBairro");

	bloco.addEventListener("blur", myFunction);
	function myFunction() {
		var lines = [];
		for (var i = 0; i < bloco.value.length; i++) {
			if (bloco.value[i] == "\n" || bloco.value[i] == ",") {
				lines.push(i);
			} 
		}
		
		rua.value = bloco.value.substring(0, lines[0]);
		cep.value = bloco.value.substring(lines[0]+1, lines[1]);
		bairro.value = bloco.value.substring(lines[1]+1, lines[2]);		
	}
</script>