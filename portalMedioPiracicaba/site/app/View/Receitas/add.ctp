<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<script>
	
$(document).ready(function(){
  var total = document.getElementById("ReceitaTotal");
  var icms = document.getElementById("ReceitaIcms");
  var outras = document.getElementById("ReceitaOutras");
	
	$("#ReceitaTotal").focus(function(){
    total.value = parseInt(icms.value) + parseInt(outras.value);
	});
});

</script>

<div class="container receitas form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Adicionar receita em ' . $cidade['Cidade']['nome']); ?></h2>
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
			<?php echo $this->Form->create('Receita', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('ano', array('class' => 'form-control', 'placeholder' => 'Ano', 'min' => 1970));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('icms', array('class' => 'form-control', 'placeholder' => 'Icms'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('outras', array('class' => 'form-control', 'placeholder' => 'Outras'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('total', array('class' => 'form-control', 'placeholder' => 'Total'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
