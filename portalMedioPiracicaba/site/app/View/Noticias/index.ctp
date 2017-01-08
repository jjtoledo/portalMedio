<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container noticias index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php 
					switch ($tipo) {
						case 1:
							echo __('Notícias Gerais'); 
							break;
						case 2:
							echo __('Notícias Regionais'); 
							break;
						case 3:
							echo __('Boas Notícias'); 
							break;
						case 4:
							echo __('Resumo de Novelas'); 
							break;
						case 5:
							echo __('Horóscopo'); 
							break;
					}
					
				?></h2>
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
							<?php 
								switch ($tipo) {
									case 1: ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Notícia'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
									<?php break;
									case 2: ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Notícia'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
									<?php break;
									case 3: ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Notícia'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
									<?php break;
									case 4: ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo Resumo'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
									<?php break;
									case 5: ?>
										<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo Horóscopo'), array('action' => 'add', $tipo), array('escape' => false)); ?></li>
									<?php break;
								}
								?>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?></li>
								<?php 
									switch ($tipo) {
										case 1:
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.__('Notícias Regionais'), array('action' => 'index', 2), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;'.__('Boas Notícias'), array('action' => 'index', 3), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;'.__('Resumo de Novelas'), array('action' => 'index', 4), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;'.__('Horóscopo'), array('action' => 'index', 5), array('escape' => false));
											echo '</li>';
											break;
										case 2:
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;'.__('Notícias Gerais'), array('action' => 'index', 1), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;'.__('Boas Notícias'), array('action' => 'index', 3), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;'.__('Resumo de Novelas'), array('action' => 'index', 4), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;'.__('Horóscopo'), array('action' => 'index', 5), array('escape' => false));
											echo '</li>';
											break;
										case 3:
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;'.__('Notícias Gerais'), array('action' => 'index', 1), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.__('Notícias Regionais'), array('action' => 'index', 2), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;'.__('Resumo de Novelas'), array('action' => 'index', 4), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;'.__('Horóscopo'), array('action' => 'index', 5), array('escape' => false));
											echo '</li>';
											break;
										case 4:
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;'.__('Notícias Gerais'), array('action' => 'index', 1), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.__('Notícias Regionais'), array('action' => 'index', 2), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;'.__('Boas Notícias'), array('action' => 'index', 3), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;'.__('Horóscopo'), array('action' => 'index', 5), array('escape' => false));
											echo '</li>';
											break;
										case 5:
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;'.__('Notícias Gerais'), array('action' => 'index', 1), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;'.__('Notícias Regionais'), array('action' => 'index', 2), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;'.__('Boas Notícias'), array('action' => 'index', 3), array('escape' => false));
											echo '</li>';
											echo '<li>';
												echo $this->Html->link('<span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;'.__('Resumo de Novelas'), array('action' => 'index', 4), array('escape' => false));
											echo '</li>';
											echo '<li>';
											break;
									}
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
						<th nowrap><?php echo $this->Paginator->sort('titulo'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('link'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($noticias as $noticia): ?>
					<tr>
						<td nowrap><?php echo h($noticia['Noticia']['titulo']); ?>&nbsp;</td>
						<td nowrap><?php echo '<a href="'.$noticia['Noticia']['link'].'" target="_blank">Link externo</a>'; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $noticia['Noticia']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $noticia['Noticia']['id'], $tipo), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $noticia['Noticia']['id'], $noticia['Noticia']['tipo']), array('escape' => false), __('Are you sure you want to delete # %s?', $noticia['Noticia']['id'])); ?>
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