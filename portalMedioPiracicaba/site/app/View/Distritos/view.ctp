<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container distritos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($distrito['Distrito']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Distritos'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Distrito'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Distrito'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
						<th><?php echo __('Nome'); ?></th>
						<td>
							<?php echo h($distrito['Distrito']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Descrição'); ?></th>
						<td>
							<?php echo h($distrito['Distrito']['descricao']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Cidade'); ?></th>
						<td>
							<?php echo $this->Html->link($distrito['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $distrito['Cidade']['id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="container related row">
	<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 divNoticia">
		<div class="card">
			<header class="cardHeader">
				<?php echo $this->Html->image(
									'gallery.png', array('alt' => 'chart', 
																					'class' => 'cardImg')); ?>
			</header>	  			
			<div class="cardBody">
				<?php echo $this->Html->link(__(
					'<span class="glyphicon glyphicon-camera"></span>&nbsp&nbsp;Fotos Distritos'), 
					array('controller' => 'fotoDistritos', 
					'action' => 'index', $distrito['Distrito']['id']), 
					array('escape' => false, 'class' => 'cardText cardPho')); ?>
			</div>
		</div><br>
	</div>
</div>