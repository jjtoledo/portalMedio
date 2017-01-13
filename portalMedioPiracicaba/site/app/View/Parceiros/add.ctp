<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container parceiros form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if ($tipo == 1) { ?>
						<h2><?php echo __('Adicionar Parceiro'); ?></h2>
				<?php	} else if ($tipo == 2) { ?>
						<h2><?php echo __('Adicionar Anúncio Quadrado'); ?></h2>
				<?php	} else if ($tipo == 3) { ?>
						<h2><?php echo __('Adicionar Anúncio Largo'); ?></h2>						
				<?php } else if ($tipo == 4) { ?>
						<h2><?php echo __('Adicionar Anúncio Tela Cheia'); ?></h2>						
				<?php }
				?>	
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
								<?php if ($tipo == 1) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;'.__('Parceiros'), array('controller' => 'parceiros', 'action' => 'index',1), array('escape' => false)); ?></li>										
								<?php	} else if ($tipo == 2) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;'.__('Anúncios Quadrados'), array('controller' => 'parceiros', 'action' => 'index',2), array('escape' => false)); ?></li>
								<?php	} else if ($tipo == 3) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-gbp"></span>&nbsp;&nbsp;'.__('Anúncios Largos'), array('controller' => 'parceiros', 'action' => 'index',3), array('escape' => false)); ?></li>
								<?php } else if ($tipo == 4) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-fullscreen"></span>&nbsp;&nbsp;'.__('Anúncios Tela Cheia'), array('controller' => 'parceiros', 'action' => 'index',4), array('escape' => false)); ?></li>
								<?php }
								?>		
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Parceiro', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('site', array('class' => 'form-control', 'placeholder' => 'Site', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('class' => 'form', 'label' => 'Foto', 'type' => 'file'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Adicionar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
