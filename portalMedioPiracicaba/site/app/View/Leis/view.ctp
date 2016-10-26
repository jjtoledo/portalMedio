<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container leis view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Lei: ' . $lei['Lei']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Leis'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Lei'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Lei'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
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
							<th><?php echo __('Descricao'); ?></th>
							<td>
								<?php echo h($lei['Lei']['descricao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Nome'); ?></th>
							<td>
								<?php echo h($lei['Lei']['nome']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Referencia'); ?></th>
							<td>
								<?php echo h($lei['Lei']['referencia']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Site'); ?></th>
							<td>
								<?php echo h($lei['Lei']['site']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($lei['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $lei['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

