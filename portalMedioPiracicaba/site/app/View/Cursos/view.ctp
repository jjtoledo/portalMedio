<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container cursos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($curso['Curso']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Cursos'), array('action' => 'index', $escola['Escola']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Curso'), array('action' => 'edit', $id, $escola['Escola']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Curso'), array('action' => 'delete', $id, $escola['Escola']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Escola'), array('controller' => 'escolas', 'action' => 'view', $escola['Escola']['id'], $escola['Escola']['cidade_id']), array('escape' => false)); ?> </li>
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
							<?php echo h($curso['Curso']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Periodos'); ?></th>
						<td>
							<?php echo h($curso['Curso']['periodos']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Descricao'); ?></th>
						<td>
							<?php echo h($curso['Curso']['descricao']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Area'); ?></th>
						<td>
							<?php echo h($curso['Curso']['area']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Escola'); ?></th>
						<td>
							<?php echo $this->Html->link($curso['Escola']['nome'], array('controller' => 'escolas', 'action' => 'view', $curso['Escola']['id'], $escola['Escola']['cidade_id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

