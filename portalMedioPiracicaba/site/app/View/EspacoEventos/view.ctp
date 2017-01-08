<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container espacoEventos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __($espacoEvento['EspacoEvento']['nome']); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar'), array('action' => 'edit', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir'), array('action' => 'delete', $id, $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-camera"></span>&nbsp&nbsp;Fotos'), array('controller' => 'fotoEspacos', 'action' => 'index', $espacoEvento['EspacoEvento']['id'], $tipo), array('escape' => false)); ?> </li>
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
								<?php echo h($espacoEvento['EspacoEvento']['nome']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Descricao'); ?></th>
							<td>
								<?php echo h($espacoEvento['EspacoEvento']['descricao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Localizacao'); ?></th>
							<td>
								<?php echo h($espacoEvento['EspacoEvento']['localizacao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone1'); ?></th>
							<td>
								<?php echo h($espacoEvento['EspacoEvento']['telefone1']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone2'); ?></th>
							<td>
								<?php echo h($espacoEvento['EspacoEvento']['telefone2']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Site'); ?></th>
							<td>
								<?php echo h($espacoEvento['EspacoEvento']['site']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
						<th><?php echo __('Foto Anúncio'); ?></th>
							<td>
								<?php echo $this->Html->image($espacoEvento['EspacoEvento']['foto_anuncio'], array('width' => '50%')); ?>
								&nbsp;
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete_foto', $espacoEvento['EspacoEvento']['id'], $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Are you sure you want to delete?')); ?>
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>