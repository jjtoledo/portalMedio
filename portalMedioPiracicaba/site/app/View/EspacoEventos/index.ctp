<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container espacoEventos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php
				switch ($tipo) {
						case 1:
							echo "<h2>Espaços para eventos de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
						case 2:
							echo "<h2>Hotéis de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
						case 3:
							echo "<h2>Restaurantes de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
						case 4:
							echo "<h2>Bancos de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
						case 5:
							echo "<h2>Sítios de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
						case 6:
							echo "<h2>Farmácias de " . $cidade['Cidade']['nome'] . "</h2>";
							break;
					}
				
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>								
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo'), array('action' => 'add', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('telefone1'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('site'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($espacoEventos as $espacoEvento): ?>
					<tr>
						<td nowrap><?php echo h($espacoEvento['EspacoEvento']['nome']); ?>&nbsp;</td>
						<td nowrap><?php echo h($espacoEvento['EspacoEvento']['telefone1']); ?>&nbsp;</td>
						<td nowrap><?php echo h($espacoEvento['EspacoEvento']['site']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-camera"></span>'), array('controller' => 'fotoEspacos', 'action' => 'index', $espacoEvento['EspacoEvento']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $espacoEvento['EspacoEvento']['id'], $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $espacoEvento['EspacoEvento']['id'], $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $espacoEvento['EspacoEvento']['id'], $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete # %s?', $espacoEvento['EspacoEvento']['id'])); ?>
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