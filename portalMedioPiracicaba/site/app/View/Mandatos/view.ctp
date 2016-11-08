<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container mandatos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Mandato'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Mandatos'), array('action' => 'index', $politico['Politico']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Mandato'), array('action' => 'edit', $id, $politico['Politico']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Mandato'), array('action' => 'delete', $id, $politico['Politico']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Politico'), array('controller' => 'politicos', 'action' => 'view', $politico['Politico']['id'], $politico['Politico']['cidade_id']), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
							<th><?php echo __('Ano Início'); ?></th>
							<td>
								<?php echo h($mandato['Mandato']['ano_inicio']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Ano Término'); ?></th>
							<td>
								<?php echo h($mandato['Mandato']['ano_termino']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Politico'); ?></th>
							<td>
								<?php echo $this->Html->link($mandato['Politico']['nome'], array('controller' => 'politicos', 'action' => 'view', $mandato['Politico']['id'], $politico['Politico']['cidade_id'])); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

