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
	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Dados Estatísticos'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>
		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Estatísticas'), array('controller' => 'estatisticas', 'action' => 'add', $cidade['Estatistica']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
		</div>
		
		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Rios'), array('controller' => 'rios', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Registros de População'), array('controller' => 'populacaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Distritos e Povoados'), array('controller' => 'distritos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Dados Históricos'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;História'), array('controller' => 'historias', 'action' => 'view', $cidade['Historia']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fundadores'), array('controller' => 'fundadors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Símbolos Municipais'), array('controller' => 'simbolos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Bairros'), array('controller' => 'bairros', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Denominações Anteriores'), array('controller' => 'denominacaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Fotos da cidade'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">			
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fotos Antigas'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 1), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fotos Atuais'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 2), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fotos Aéreas'), array('controller' => 'fotos', 'action' => 'index', $cidade['Cidade']['id'], 3), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Vídeos da cidade'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">			
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar vídeos'), array('controller' => 'videos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Lazer e Turismo'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Atrativos Turísticos'), array('controller' => 'atrativoTuristicos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Eventos'), array('controller' => 'eventos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Patrimônios Históricos e Culturais'), array('controller' => 'patrimonios', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Espaços para Eventos'), array('controller' => 'espaco_eventos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Educação'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Municipais'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 0), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Estaduais'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 1), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Federais'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 2), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Particulares'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 5), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Profissionalizantes'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 6), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas de Idiomas'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 7), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Pré Vestibulares'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 8), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Escolas Especializadas'), array('controller' => 'escolas', 'action' => 'index', $cidade['Cidade']['id'], 9), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp; Faculdades'), array('controller' => 'escolas', 'action' => 'index_fac', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Horários de Ônibus'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Empresas de Ônibus'), array('controller' => 'empresaOnibuses', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Economia'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Dados Econômicos'), array('controller' => 'economias', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Receitas Municipais'), array('controller' => 'receitas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>
		</div>	

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Empresas'), array('controller' => 'empresas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>	
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Saúde'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Órgãos de saúde'), array('controller' => 'orgaoSaudes', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>	

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Médicos'), array('controller' => 'medicos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>	
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Prestadores de Serviços'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Prestadores'), array('controller' => 'prestadors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Poder Executivo'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Leis'), array('controller' => 'leis', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Prefeitos'), array('controller' => 'politicos', 'action' => 'index', $cidade['Cidade']['id'], 1), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Prefeitura'), array('controller' => 'prefeituras', 'action' => 'view', $cidade['Prefeitura']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Poder Legislativo'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Vereadores'), array('controller' => 'politicos', 'action' => 'index', $cidade['Cidade']['id'], 2), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>

		<div class="col-md-3 menu">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ex Vereadores'), array('controller' => 'exvereadors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
			</div>			
		</div>
		
		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Comissões Permanentes'), array('controller' => 'comissaos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>		

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Câmara Municipal'), array('controller' => 'camaras', 'action' => 'add', $cidade['Camara']['id'], $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Ex Presidentes Câmara'), array('controller' => 'presidenteCamaras', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Poder Judiciário'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fóruns'), array('controller' => 'forums', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>
			
		</div>		

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Juízes'), array('controller' => 'juizs', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>


		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Promotores'), array('controller' => 'promotors', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Solicitação de Documentos'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('controller' => 'documentos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Órgãos Públicos'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Órgãos Públicos'), array('controller' => 'orgaoPublicos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Assistências Sociais'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Assistências Sociais'), array('controller' => 'socials', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>				
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Mapas'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Mapas'), array('controller' => 'mapas', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>	
	</div>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<h3><?php echo __('Endereços'); ?></h3>
			<hr style="border-bottom: 1px solid #ddd">
		</div>

		<div class="col-md-3 menu">
				<div class="actions">
					<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Endereços'), array('controller' => 'enderecos', 'action' => 'index', $cidade['Cidade']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
				</div>			
		</div>
	</div>	
</div>
