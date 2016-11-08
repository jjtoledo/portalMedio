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
					<?php echo $this->Form->input('icms', array('class' => 'form-control', 'placeholder' => 'ICMS', 'label' => 'ICMS'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ipi', array('class' => 'form-control', 'placeholder' => 'IPI', 'label' => 'IPI'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ipva', array('class' => 'form-control', 'placeholder' => 'IPVA', 'label' => 'IPVA'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fpm', array('class' => 'form-control', 'placeholder' => 'FPM', 'label' => 'FPM'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('royalties', array('class' => 'form-control', 'placeholder' => 'Royalties', 'label' => 'Royalties'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('itr', array('class' => 'form-control', 'placeholder' => 'ITR', 'label' => 'ITR'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cide', array('class' => 'form-control', 'placeholder' => 'CIDE', 'label' => 'CIDE'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fundeb', array('class' => 'form-control', 'placeholder' => 'Fundeb', 'label' => 'Fundeb'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('lei_kandir', array('class' => 'form-control', 'placeholder' => 'Lei Kandir', 'label' => 'Lei Kandir'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fex', array('class' => 'form-control', 'placeholder' => 'FEX', 'label' => 'FEX'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('afm_afe', array('class' => 'form-control', 'placeholder' => 'AFM/AFE', 'label' => 'AFM/AFE'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('iptu', array('class' => 'form-control', 'placeholder' => 'IPTU', 'label' => 'IPTU'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('iss', array('class' => 'form-control', 'placeholder' => 'ISS', 'label' => 'ISS'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('irrf', array('class' => 'form-control', 'placeholder' => 'IRRF Rend. Trabalho', 'label' => 'IRRF Rend. Trabalho'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('total', array('class' => 'form-control', 'placeholder' => 'Total', 'label' => 'Total'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
