<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container escolas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($escola['Escola']['nome']); ?></h2>
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
								<?php if ($tipo < 3 || $tipo > 4) { ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Escolas'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Escola'), array('action' => 'edit', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
									<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Escola'), array('action' => 'delete', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<?php } else { ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Faculdades'), array('action' => 'index_fac', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Faculdade'), array('action' => 'edit', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
									<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Faculdade'), array('action' => 'delete', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<?php } ?>
								<?php if ($tipo == 3 || $tipo == 4) { ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Listar Cursos'), array('controller' => 'cursos', 'action' => 'index', $escola['Escola']['id'], $tipo), array('escape' => false)); ?> </li>
								<?php } ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;Fotos'), array('controller' => 'foto_escolas', 'action' => 'index', $escola['Escola']['id'], $tipo), array('escape' => false)); ?> </li>
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
							<?php echo h($escola['Escola']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Descricao'); ?></th>
						<td>
							<?php echo h($escola['Escola']['descricao']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Localizacao'); ?></th>
						<td>
							<?php echo h($escola['Escola']['localizacao']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Tipo'); ?></th>
						<td>
							<?php echo __($tipos[$escola['Escola']['tipo']]); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone1'); ?></th>
						<td>
							<?php echo h($escola['Escola']['telefone1']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone2'); ?></th>
						<td>
							<?php echo h($escola['Escola']['telefone2']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Site'); ?></th>
						<td>
							<?php echo h($escola['Escola']['site']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Cidade'); ?></th>
						<td>
							<?php echo $this->Html->link($escola['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $escola['Cidade']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Foto Anúncio'); ?></th>
						<td>
							<?php echo $this->Html->image($escola['Escola']['foto_anuncio'], array('height' => '50%')); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>
