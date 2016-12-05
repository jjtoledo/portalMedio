<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container empresaOnibuss view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Empresa: ' . $empresaOnibus['EmpresaOnibus']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Empresas'), array('action' => 'index', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Empresa'), array('action' => 'edit', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Empresa'), array('action' => 'delete', $id, $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-save-file"></span>&nbsp&nbsp;Linhas (PDF)'), array('controller' => 'onibusRotas', 'action' => 'index', $empresaOnibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-file"></span>&nbsp&nbsp;Linhas (Word)'), array('controller' => 'horarios', 'action' => 'add', $empresaOnibus['Horario']['id'], $empresaOnibus['EmpresaOnibus']['id'], $empresaOnibus['EmpresaOnibus']['cidade_id']), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
							<th><?php echo __('Nome do local'); ?></th>
							<td>
								<?php echo h($empresaOnibus['EmpresaOnibus']['nome']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone1'); ?></th>
							<td>
								<?php echo h($empresaOnibus['EmpresaOnibus']['telefone1']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Telefone2'); ?></th>
							<td>
								<?php echo h($empresaOnibus['EmpresaOnibus']['telefone2']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Site'); ?></th>
							<td>
								<?php echo h($empresaOnibus['EmpresaOnibus']['site']); ?>
								&nbsp;
							</td>
					</tr>
					<tr>
							<th><?php echo __('Cidade'); ?></th>
							<td>
								<?php echo $this->Html->link($empresaOnibus['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $empresaOnibus['Cidade']['id'])); ?>
								&nbsp;
							</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

