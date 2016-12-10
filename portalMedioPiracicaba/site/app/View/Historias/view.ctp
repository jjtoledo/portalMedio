<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container historias view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Historia: ' . $cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Historia'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Historia'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
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
							<th><?php echo __('História'); ?></th>
							<td>
								<?php echo h($historia['Historia']['historia']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Adoção do nome'); ?></th>
							<td>
								<?php echo h($historia['Historia']['adocao_nome']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Emancipação'); ?></th>
							<td>
								<?php echo h($historia['Historia']['emancipacao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Adjetivo Pátrio'); ?></th>
							<td>
								<?php echo h($historia['Historia']['adjetivo_patrio']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($historia['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $historia['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Foto'); ?></th>
							<td>
								<?php echo $this->Html->image($historia['Historia']['foto'], array('height' => '50%')); ?>
								&nbsp;
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete_foto', $historia['Historia']['id'], $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete?')); ?>
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

