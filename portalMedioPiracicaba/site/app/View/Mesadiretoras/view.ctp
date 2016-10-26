<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container mesadiretoras view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($mesadiretora['Mesadiretora']['nome']); ?></h2>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Mesas diretoras'), array('action' => 'index', $camara['Camara']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Mesa diretora'), array('action' => 'edit', $id, $camara['Camara']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Mesa diretora'), array('action' => 'delete', $id, $camara['Camara']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Camara'), array('controller' => 'camaras', 'action' => 'view', $camara['Camara']['id'], $camara['Camara']['cidade_id']), array('escape' => false)); ?> </li>
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
							<?php echo h($mesadiretora['Mesadiretora']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Descrição'); ?></th>
						<td>
							<?php echo h($mesadiretora['Mesadiretora']['descricao']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Ano início'); ?></th>
						<td>
							<?php echo h($mesadiretora['Mesadiretora']['ano_inicio']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Ano término'); ?></th>
						<td>
							<?php echo h($mesadiretora['Mesadiretora']['ano_termino']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Camara'); ?></th>
						<td>
							<?php echo $this->Html->link($mesadiretora['Camara']['nome'], array('controller' => 'camaras', 'action' => 'view', $mesadiretora['Camara']['id'], $camara['Camara']['cidade_id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

