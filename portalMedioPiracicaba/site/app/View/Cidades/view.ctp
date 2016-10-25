<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container cidades view">
	<div class="row">
		<div class="container">
			<div class="page-header">
				<h2><?php echo __($cidade['Cidade']['nome']); ?></h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Cidades'), array('action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Cidade'), array('action' => 'edit', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cidade['Cidade']['id'])); ?> </li>
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
							<?php echo h($cidade['Cidade']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Descrição'); ?></th>
						<td>
							<?php echo h($cidade['Cidade']['descricao']); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4 menu">
			
				<h3><?php echo __('Dados Estatísticos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Dados Estatísticos'), array('controller' => 'estatisticas', 'action' => 'add', $cidade['Estatistica']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Dados Históricos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Dados Históricos'), array('controller' => 'historias', 'action' => 'add', $cidade['Historia']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Dados Econômicos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Dados Econômicos'), array('controller' => 'economias', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Atrativos Turísticos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Atrativos'), array('controller' => 'atrativoTuristicos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>
			  	

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Bairros'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Bairros'), array('controller' => 'bairros', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Denominações anteriores'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Denominações'), array('controller' => 'denominacaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Distritos relacionados'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Distritos'), array('controller' => 'distritos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Câmaras'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Câmaras'), array('controller' => 'camaras', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Comissões'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Comissões'), array('controller' => 'comissaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Documentos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Documentos'), array('controller' => 'documentos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Empresas de Ônibus'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Empresas'), array('controller' => 'empresaOnibuses', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Endereços'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Endereços'), array('controller' => 'enderecos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Foruns'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Foruns'), array('controller' => 'forums', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Juizes'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Juizes'), array('controller' => 'juizs', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Mapas'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Mapas'), array('controller' => 'mapas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Promotores'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Promotores'), array('controller' => 'promotors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Assistências Sociais'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Assistências Sociais'), array('controller' => 'socials', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Escolas relacionadas'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Escolas'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Faculdades relacionadas'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Faculdades'), array('controller' => 'escolas', 'action' => 'index_fac', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Eventos relacionados'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Eventos'), array('controller' => 'eventos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Espaços para eventos'); ?></h3>
				<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Espaços'), array('controller' => 'espaco_eventos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Fotos Antigas'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Fotos'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 1), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Fotos Atuais'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Fotos'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 2), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Fotos Aéreas'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Fotos'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 3), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Fundadores'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Fundadores'), array('controller' => 'fundadors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Leis'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Leis'), array('controller' => 'leis', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
				<h3><?php echo __('Médicos'); ?></h3>
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Médicos'), array('controller' => 'medicos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Registros de População'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Registros'), array('controller' => 'populacaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Prestadores de Serviços'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Prestadores'), array('controller' => 'prestadors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Rios'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Rios'), array('controller' => 'rios', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Patrimônios'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Patrimônios'), array('controller' => 'patrimonios', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Símbolos'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Símbolos'), array('controller' => 'simbolos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Receitas'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Receitas'), array('controller' => 'receitas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Related Empresa Onibuses'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar Empresa Onibus'), array('controller' => 'empresa_onibuses', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>

		<div class="col-md-4 menu">
			
			<h3><?php echo __('Related Orgao Publicos'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar Orgao Publico'), array('controller' => 'orgao_publicos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>


		<div class="col-md-4 menu">
			
			<h3><?php echo __('Related Saudes'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar Saude'), array('controller' => 'saudes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
			
		</div>
	</div>
</div>
