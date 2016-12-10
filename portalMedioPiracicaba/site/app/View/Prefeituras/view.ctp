<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container prefeituras view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Prefeitura: ' . $cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Prefeitura'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Prefeitura'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
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
							<th><?php echo __('Descrição'); ?></th>
							<td>
								<?php echo h($prefeitura['Prefeitura']['descricao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone1'); ?></th>
							<td>
								<?php echo h($prefeitura['Prefeitura']['telefone1']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone2'); ?></th>
							<td>
								<?php echo h($prefeitura['Prefeitura']['telefone2']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Endereço'); ?></th>
							<td>
								<?php echo h($prefeitura['Prefeitura']['endereco']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Descrição'); ?></th>
							<td>
								<?php echo h($prefeitura['Prefeitura']['descricao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($prefeitura['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $prefeitura['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Foto'); ?></th>
							<td>
								<?php echo $this->Html->image($prefeitura['Prefeitura']['foto'], array('height' => '50%')); ?>
								&nbsp;
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete_foto', $prefeitura['Prefeitura']['id'], $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete?')); ?>
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

