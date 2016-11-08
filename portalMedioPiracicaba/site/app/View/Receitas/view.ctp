<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container receitas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Receita'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Receitas'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Receita'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Receita'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
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
								<?php echo h($receita['Receita']['ano']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Icms'); ?></th>
							<td>
								<?php echo h($receita['Receita']['icms']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('IPI'); ?></th>
							<td>
								<?php echo h($receita['Receita']['ipi']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('IPVA'); ?></th>
							<td>
								<?php echo h($receita['Receita']['ipva']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('FPM'); ?></th>
							<td>
								<?php echo h($receita['Receita']['fpm']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Royalties'); ?></th>
							<td>
								<?php echo h($receita['Receita']['royalties']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('ITR'); ?></th>
							<td>
								<?php echo h($receita['Receita']['itr']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('CIDE'); ?></th>
							<td>
								<?php echo h($receita['Receita']['cide']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Fundeb'); ?></th>
							<td>
								<?php echo h($receita['Receita']['fundeb']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Lei Kandir'); ?></th>
							<td>
								<?php echo h($receita['Receita']['lei_kandir']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('FEX'); ?></th>
							<td>
								<?php echo h($receita['Receita']['fex']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('AFM/AFE'); ?></th>
							<td>
								<?php echo h($receita['Receita']['afm_afe']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('IPTU'); ?></th>
							<td>
								<?php echo h($receita['Receita']['iptu']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('ISS'); ?></th>
							<td>
								<?php echo h($receita['Receita']['iss']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('IRRF'); ?></th>
							<td>
								<?php echo h($receita['Receita']['irrf']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Total'); ?></th>
							<td>
								<?php echo h($receita['Receita']['total']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($receita['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $receita['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

