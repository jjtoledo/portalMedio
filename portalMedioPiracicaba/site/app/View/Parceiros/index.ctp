<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container parceiros index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if ($tipo == 1) { ?>
						<h2><?php echo __('Parceiros'); ?></h2>
				<?php	} else if ($tipo == 2) { ?>
						<h2><?php echo __('Anúncios Quadrados'); ?></h2>
				<?php	}	else { ?>
						<h2><?php echo __('Anúncios Largos'); ?></h2>
				<?php	}
				?>			
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;'.__('Notícias Gerais'), array('controller' => 'noticias', 'action' => 'index', 1), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.__('Notícias Regionais'), array('controller' => 'noticias', 'action' => 'index', 2), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;'.__('Boas Notícias'), array('controller' => 'noticias', 'action' => 'index', 3), array('escape' => false)); ?></li>
								<?php if ($tipo == 1) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;'.__('Anúncios Quadrados'), array('controller' => 'parceiros', 'action' => 'index',2), array('escape' => false)); ?></li>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-gbp"></span>&nbsp;&nbsp;'.__('Anúncios Largos'), array('controller' => 'parceiros', 'action' => 'index',3), array('escape' => false)); ?></li>
								<?php	} else if ($tipo == 2) { ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;'.__('Parceiros'), array('controller' => 'parceiros', 'action' => 'index',1), array('escape' => false)); ?></li>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-gbp"></span>&nbsp;&nbsp;'.__('Anúncios Largos'), array('controller' => 'parceiros', 'action' => 'index',3), array('escape' => false)); ?></li>
								<?php	} else {  ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;'.__('Parceiros'), array('controller' => 'parceiros', 'action' => 'index',1), array('escape' => false)); ?></li>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-gbp"></span>&nbsp;&nbsp;'.__('Anúncios Quadrados'), array('controller' => 'parceiros', 'action' => 'index',2), array('escape' => false)); ?></li>
								<?php	} 
								?>								
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('site'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($parceiros as $parceiro): ?>
					<tr>
						<td nowrap><?php echo h($parceiro['Parceiro']['site']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $parceiro['Parceiro']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $parceiro['Parceiro']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $parceiro['Parceiro']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete # %s?', $parceiro['Parceiro']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->