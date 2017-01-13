<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container despesas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Despesa'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Despesas'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Despesa'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Despesa'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
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
							<th><?php echo __('Ano'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['ano']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 1'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp1']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 2'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp2']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 3'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp3']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 4'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp4']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 5'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp5']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 6'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp6']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 7'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp7']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 8'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp8']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 9'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp9']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 10'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp10']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 11'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp11']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 12'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp12']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 13'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp13']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 14'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp14']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 15'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp15']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 16'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp16']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 17'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp17']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Despesa 18'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['desp18']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Total'); ?></th>
							<td>
								<?php echo h($despesa['Despesa']['total']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($despesa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $despesa['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

