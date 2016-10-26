<div class="fotoEspacos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Foto Espaco'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Foto Espaco'), array('action' => 'edit', $fotoEspaco['FotoEspaco']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Foto Espaco'), array('action' => 'delete', $fotoEspaco['FotoEspaco']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $fotoEspaco['FotoEspaco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Foto Espacos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Foto Espaco'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Espaco Eventos'), array('controller' => 'espaco_eventos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Espaco Evento'), array('controller' => 'espaco_eventos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($fotoEspaco['FotoEspaco']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Foto'); ?></th>
		<td>
			<?php echo h($fotoEspaco['FotoEspaco']['foto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Espaco Evento'); ?></th>
		<td>
			<?php echo $this->Html->link($fotoEspaco['EspacoEvento']['id'], array('controller' => 'espaco_eventos', 'action' => 'view', $fotoEspaco['EspacoEvento']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

