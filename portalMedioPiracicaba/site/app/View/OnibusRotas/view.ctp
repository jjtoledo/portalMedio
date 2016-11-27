<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container onibusRotas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __($onibusRota['OnibusRota']['rota']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Rotas'), array('action' => 'index', $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Rota'), array('action' => 'edit', $id, $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Rota'), array('action' => 'delete', $id, $empresa_onibus['EmpresaOnibus']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Empresa'), array('controller' => 'empresa_onibuses', 'action' => 'view', $empresa_onibus['EmpresaOnibus']['id'], $empresa_onibus['EmpresaOnibus']['cidade_id']), array('escape' => false)); ?> </li>								
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
						<th><?php echo __('Rota'); ?></th>
						<td>
							<?php echo h($onibusRota['OnibusRota']['rota']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Tipo'); ?></th>
						<td>
							<?php echo h($onibusRota['OnibusRota']['tipo']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Horários'); ?></th>
						<td>
							<?php echo h($onibusRota['OnibusRota']['frequencia']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('EmpresaOnibus'); ?></th>
						<td>
							<?php echo $this->Html->link($onibusRota['EmpresaOnibus']['nome'], array('controller' => 'empresa_onibuss', 'action' => 'view', $onibusRota['EmpresaOnibus']['id'], $empresa_onibus['EmpresaOnibus']['cidade_id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

