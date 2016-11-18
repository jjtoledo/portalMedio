<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container politicos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2><?php echo __('Político'); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Políticos'), array('action' => 'index', $cidade['Cidade']['id'], $politico['Politico']['tipo']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Político'), array('action' => 'edit', $id, $cidade['Cidade']['id'], $politico['Politico']['tipo']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Político'), array('action' => 'delete', $id, $cidade['Cidade']['id'],  $politico['Politico']['tipo']), array('escape' => false), __('Are you sure you want to delete # %s?', $id)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Cidade'), array('controller' => 'cidades', 'action' => 'view', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-camera"></span>&nbsp&nbsp;Fotos'), array('controller' => 'fotoPoliticos', 'action' => 'index', $politico['Politico']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-briefcase"></span>&nbsp&nbsp;Mandatos'), array('controller' => 'mandatos', 'action' => 'index', $politico['Politico']['id']), array('escape' => false)); ?> </li>
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
							<?php echo h($politico['Politico']['nome']); ?>
							&nbsp;
						</td>
				</tr>
				<tr>
						<th><?php echo __('Mesa Diretora'); ?></th>
						<td>
							<?php 
							if ($politico['Politico']['mesa_diretora'] != 0) { 
								echo 'Sim';
							} else {
								echo 'Não';
							}
							?>
							&nbsp;
						</td>
				</tr>				
				<tr>
						<th><?php echo __('Presidente da mesa'); ?></th>
						<td>
							<?php 
							if ($politico['Politico']['presidente'] != 0) { 
								echo 'Sim';
							} else {
								echo 'Não';
							}
							?>
							&nbsp;
						</td>
				</tr>
				<tr>
						<th><?php echo __('Comissão'); ?></th>
						<td>
							<?php 
								$comissao = array();
								foreach ($comissaos as $c) {
									if ($c['Comissao']['id'] == $politico['Politico']['comissao_id'] ||
											$c['Comissao']['id'] == $politico['Politico']['comissao_id1'] ||
											$c['Comissao']['id'] == $politico['Politico']['comissao_id2'] ||
											$c['Comissao']['id'] == $politico['Politico']['comissao_id3']) {
										array_push($comissao, $c['Comissao']['nome']);
									}
								}
								for ($i=0; $i < count($comissao); $i++) { 
									if ($i == count($comissao)-1) {
										echo $comissao[$i];
									} else {
										echo $comissao[$i] . ', ';
									}
								}

							?>
							&nbsp;
						</td>
				</tr>
				<tr>
						<th><?php echo __('Cidade'); ?></th>
						<td>
							<?php echo $this->Html->link($politico['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $politico['Cidade']['id'])); ?>
							&nbsp;
						</td>
				</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>
