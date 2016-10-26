<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container orgaoSaudes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __($orgaoSaude['OrgaoSaude']['nome']); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Órgãos'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Órgão'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Órgão'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-camera"></span>&nbsp&nbsp;Fotos'), array('controller' => 'fotoSaudes', 'action' => 'index', $orgaoSaude['OrgaoSaude']['id']), array('escape' => false)); ?> </li>
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
								<?php echo h($orgaoSaude['OrgaoSaude']['nome']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Tipo'); ?></th>
							<td>
								<?php echo h($orgaoSaude['OrgaoSaude']['tipo']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Localização'); ?></th>
							<td>
								<?php echo h($orgaoSaude['OrgaoSaude']['localizacao']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone1'); ?></th>
							<td>
								<?php echo h($orgaoSaude['OrgaoSaude']['telefone1']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone2'); ?></th>
							<td>
								<?php echo h($orgaoSaude['OrgaoSaude']['telefone2']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Site'); ?></th>
							<td>
								<?php echo h($orgaoSaude['OrgaoSaude']['site']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($orgaoSaude['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $orgaoSaude['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Foto anúncio'); ?></th>
							<td>
								<?php echo $this->Html->image($orgaoSaude['OrgaoSaude']['foto_anuncio'], array('height' => '50%')); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>