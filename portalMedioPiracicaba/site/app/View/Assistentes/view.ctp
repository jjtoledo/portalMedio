<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container assistentes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($assistente['Assistente']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Assistentes'), array('action' => 'index', $social['Social']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Assistente'), array('action' => 'edit', $id, $social['Social']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Assistente'), array('action' => 'delete', $id, $social['Social']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Social'), array('controller' => 'socials', 'action' => 'view', $social['Social']['id'], $social['Social']['cidade_id']), array('escape' => false)); ?> </li>
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
							<?php echo h($assistente['Assistente']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Endereço'); ?></th>
						<td>
							<?php echo h($assistente['Assistente']['endereco']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone 1'); ?></th>
						<td>
							<?php echo h($assistente['Assistente']['telefone1']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone 2'); ?></th>
						<td>
							<?php echo h($assistente['Assistente']['telefone2']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Social'); ?></th>
						<td>
							<?php echo $this->Html->link($assistente['Social']['nome'], array('controller' => 'socials', 'action' => 'view', $assistente['Social']['id'], $social['Social']['cidade_id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

