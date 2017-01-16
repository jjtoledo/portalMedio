<?php echo $this->Element('navigation_admin'); ?>
<?php echo $this->Element('modal_sair'); ?>

<div class="container politicos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h2>
				<?php 
				if ($tipo == 1) {
					echo __('Editar Prefeito'); 
				} else {
					echo __('Editar Vereador'); 
				}
				?>					
				</h2>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp&nbsp;Detalhes Político'), array('action' => 'view', $id, $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Políticos'), array('action' => 'index', $cidade['Cidade']['id'], $tipo), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Politico.id'), $cidade['Cidade']['id'], $tipo), array('escape' => false), __('Tem certeza que deseja excluir # %s?', $this->Form->value('Politico.nome'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Politico', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome', 'required' => 'true'));?>
				</div>
				
				<div id="mesa" hidden="true">
					<div class="form-group">
						<label>Faz parte de Mesa Diretora?</label><br>
						<?php echo $this->Form->radio('mesa_diretora', array('0' => 'Não', '1' => 'Sim'), array('legend' => '', 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));?>
					</div>
				</div>
				
				<div id="presidente" hidden="true">
					<div class="form-group">
						<label>É presidente?</label><br>
						<?php echo $this->Form->radio('presidente', array('0' => 'Não', '1' => 'Sim'), array('legend' => '', 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));?>
					</div>
				</div>

				<div id="comissao" hidden="true">
					<div class="form-group">
						<?php echo $this->Form->input('comissao_id', array('class' => 'form-control', 'label' => 'Faz parte de Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>				

				<div id="comissao1" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id1', $comissaos, array('class' => 'form-control', 'label' => '', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn1" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao2" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id2', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn2" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao3" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id3', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn3" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao4" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id4', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn4" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao5" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id5', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn5" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao6" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id6', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div id="btn6" hidden="true">
					<div class="form-group">
						<button type="button" class="btn btn-info btn-xs">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais Comissão
						</button>
					</div>
				</div>

				<div id="comissao7" hidden="true">
					<div class="form-group">
						<label>Faz parte de outra Comissão?</label>
						<?php echo $this->Form->select('comissao_id7', $comissaos, array('class' => 'form-control', 'label' => 'Faz parte de outra Comissão?', 'empty' => array('6' => 'Não')));?>
					</div>
				</div>

				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<script type="text/javascript">
	var mesa         = document.getElementById('mesa');
	var mesaNao      = document.getElementById('PoliticoMesaDiretora0');
	var presidente   = document.getElementById('presidente');
	var comissao     = document.getElementById('comissao');
	var comissao1    = document.getElementById('comissao1');
	var comissao2    = document.getElementById('comissao2');
	var comissao3    = document.getElementById('comissao3');
	var comissao4    = document.getElementById('comissao4');
	var comissao5    = document.getElementById('comissao5');
	var comissao6    = document.getElementById('comissao6');
	var comissao7    = document.getElementById('comissao7');
	var comissao_id  = document.getElementById('PoliticoComissaoId');
	var comissao_id1 = document.getElementById('PoliticoComissaoId1');
	var comissao_id2 = document.getElementById('PoliticoComissaoId2');
	var comissao_id3 = document.getElementById('PoliticoComissaoId3');
	var comissao_id4 = document.getElementById('PoliticoComissaoId4');
	var comissao_id5 = document.getElementById('PoliticoComissaoId5');
	var comissao_id6 = document.getElementById('PoliticoComissaoId6');
	var comissao_id7 = document.getElementById('PoliticoComissaoId7');
 	var btn          = document.getElementById('btn');
 	var btn1         = document.getElementById('btn1');
 	var btn2         = document.getElementById('btn2');
 	var btn3         = document.getElementById('btn3');
 	var btn4         = document.getElementById('btn4');
 	var btn5         = document.getElementById('btn5');
 	var btn6         = document.getElementById('btn6');

	if (<?php echo $tipo ?> == 2) {
		mesa.removeAttribute('hidden');			
		comissao.removeAttribute('hidden');
	}

	mesa.addEventListener("change", function() {
		if (mesaNao.checked) {
			presidente.setAttribute('hidden', 'true');
		} else {
			presidente.removeAttribute('hidden');			
		}
	});

	if (comissao_id.options[comissao_id.selectedIndex].value != 6) {
		btn.removeAttribute('hidden');			
	} 

	if (comissao_id1.options[comissao_id1.selectedIndex].value != 6) {
		btn.setAttribute('hidden', 'true');
		btn1.removeAttribute('hidden');			
		comissao1.removeAttribute('hidden');		
	} 

	if (comissao_id2.options[comissao_id2.selectedIndex].value != 6) {
		btn1.setAttribute('hidden', 'true');
		btn2.removeAttribute('hidden');			
		comissao2.removeAttribute('hidden');		
	} 

	if (comissao_id3.options[comissao_id3.selectedIndex].value != 6) {
		btn2.setAttribute('hidden', 'true');
		btn3.removeAttribute('hidden');
		comissao3.removeAttribute('hidden');		
	} 

	if (comissao_id4.options[comissao_id4.selectedIndex].value != 6) {
		btn3.setAttribute('hidden', 'true');
		btn4.removeAttribute('hidden');
		comissao4.removeAttribute('hidden');		
	} 

	if (comissao_id5.options[comissao_id5.selectedIndex].value != 6) {
		btn4.setAttribute('hidden', 'true');
		btn5.removeAttribute('hidden');
		comissao5.removeAttribute('hidden');		
	} 

	if (comissao_id6.options[comissao_id6.selectedIndex].value != 6) {
		btn5.setAttribute('hidden', 'true');
		btn6.removeAttribute('hidden');
		comissao6.removeAttribute('hidden');		
	} 

	if (comissao_id7.options[comissao_id7.selectedIndex].value != 6) {
		btn6.setAttribute('hidden', 'true');
		btn7.removeAttribute('hidden');
		comissao7.removeAttribute('hidden');		
	} 

	comissao_id.addEventListener("change", function() {
		if (comissao_id.options[comissao_id.selectedIndex].value != 6) {
			btn.removeAttribute('hidden');			
		} else {			
			btn.setAttribute('hidden', 'true');
		}
	});

	btn.addEventListener("click", function() {
		btn.setAttribute('hidden', 'true');		
		comissao1.removeAttribute('hidden');		
	});

	comissao_id1.addEventListener("change", function() {
		if (comissao_id1.options[comissao_id1.selectedIndex].value != 6) {
			btn1.removeAttribute('hidden');			
		} else {			
			btn1.setAttribute('hidden', 'true');
		}
	});

	btn1.addEventListener("click", function() {
		btn1.setAttribute('hidden', 'true');		
		comissao2.removeAttribute('hidden');	
	});

	comissao_id2.addEventListener("change", function() {
		if (comissao_id2.options[comissao_id2.selectedIndex].value != 6) {
			btn2.removeAttribute('hidden');			
		} else {			
			btn2.setAttribute('hidden', 'true');
		}
	});

	btn2.addEventListener("click", function() {
		btn2.setAttribute('hidden', 'true');		
		comissao3.removeAttribute('hidden');	
	});

	comissao_id3.addEventListener("change", function() {
		if (comissao_id3.options[comissao_id3.selectedIndex].value != 6) {
			btn3.removeAttribute('hidden');			
		} else {			
			btn3.setAttribute('hidden', 'true');
		}
	});

	btn3.addEventListener("click", function() {
		btn3.setAttribute('hidden', 'true');		
		comissao4.removeAttribute('hidden');	
	});

	comissao_id4.addEventListener("change", function() {
		if (comissao_id4.options[comissao_id4.selectedIndex].value != 6) {
			btn4.removeAttribute('hidden');			
		} else {			
			btn4.setAttribute('hidden', 'true');
		}
	});

	btn4.addEventListener("click", function() {
		btn4.setAttribute('hidden', 'true');		
		comissao5.removeAttribute('hidden');	
	});

	comissao_id5.addEventListener("change", function() {
		if (comissao_id5.options[comissao_id5.selectedIndex].value != 6) {
			btn5.removeAttribute('hidden');			
		} else {			
			btn5.setAttribute('hidden', 'true');
		}
	});

	btn5.addEventListener("click", function() {
		btn5.setAttribute('hidden', 'true');		
		comissao6.removeAttribute('hidden');	
	});

	comissao_id6.addEventListener("change", function() {
		if (comissao_id6.options[comissao_id6.selectedIndex].value != 6) {
			btn6.removeAttribute('hidden');			
		} else {			
			btn6.setAttribute('hidden', 'true');
		}
	});

	btn6.addEventListener("click", function() {
		btn6.setAttribute('hidden', 'true');		
		comissao7.removeAttribute('hidden');	
	});
</script>