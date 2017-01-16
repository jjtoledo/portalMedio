<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<?php if (!is_null(($cidade['Prefeitura']))) { ?>
		<section style="background-color: #e8e8e8">
			<div class="container">
				<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Prefeitura de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>			
					</div>

				<div class="col-md-12 text-justify">
					<?php
						if (!empty($cidade['Prefeitura']['foto'])) {
							echo '<div class="col-md-3 noticia_foto">';
							echo $this->Html->image($cidade['Prefeitura']['foto'], array('width' => '100%')); 
						  echo '</div>';
						}

						if (!empty($cidade['Prefeitura']['descricao'])) {
					  	echo '<div class="">'.$cidade['Prefeitura']['descricao'];
					  }

					  if (!empty($cidade['Prefeitura']['endereco'])) {
							echo '<br><br><p><b>Endereço: </b>' . $cidade['Prefeitura']['endereco'] . '</p>';
					  }

					  if (!empty($cidade['Prefeitura']['telefone1'])) {
					  	echo '<p><b>Telefone: </b>' . $cidade['Prefeitura']['telefone1'] . '</p>';
					  }

					  if (!empty($cidade['Prefeitura']['telefone2'])) {
					  	echo '<p><b>Telefone: </b>' . $cidade['Prefeitura']['telefone2'] . '</p>';
					  }

					  if (!empty($cidade['Prefeitura']['secretarias'])) {
					  	echo '<p><b>Secretarias: </b><br>' . $cidade['Prefeitura']['secretarias'] . '</p>';
					  }
					?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($prefeito)) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Prefeito atual</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-6 col-md-offset-3 text-justify">
					<?php
						echo '<div class="col-md-12" style="margin-bottom: 50px">';
    					if (!empty($prefeito['0']['FotoPolitico'])) {
    						echo '<div class="col-md-12">'.$this->Html->image(end($prefeito['0']['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
    					} else {
      					echo '<div class="col-md-12">'.$this->Html->image('politico-icon.png', array('width' => '65%', 'height' => '100%')).'</div>';
      				}
      				
      				echo '<div class="col-md-12 text-center" style="font-size:20px"><br><b>'
    						.$prefeito['0']['Politico']['nome'].'</b><br><br>';
    						if (!empty($prefeito['0']['Mandato'])) {
    							echo '<b>Mandato:</b><br>';
    							foreach ($prefeito['0']['Mandato'] as $mandato) {
    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
    							}
    						} 
    					echo '</div>';
  					echo '</div>';
	      	?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($prefeitos)) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Prefeitos ao longo dos anos</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12 text-justify">
					<?php $count = 0; $b = 0; foreach ($prefeitos as $p) {
						if ($b == 3) {	
      				$b = 0;	      				
      				echo '</div>';
      			}
      			if ($count % 3 == 0) {	
      				echo '<div class="row">';
      			}
    				echo '<div class="col-md-4" style="margin-top: 20px">';
    					if (!empty($p['FotoPolitico'])) {
    						echo '<div class="col-md-6">'.$this->Html->image(end($p['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
    					} else {
      					echo '<div class="col-md-6">'.$this->Html->image('politico-icon.png', array('width' => '65%', 'height' => '100%')).'</div>';
      				}
      				
      				echo '<div class="col-md-6"><b>'
    						.$p['Politico']['nome'].'</b><br><br>';
    						if (!empty($p['Mandato'])) {
    							echo '<b>Mandato:</b><br>';
    							foreach ($p['Mandato'] as $mandato) {
    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
    							}
    						} 
    					echo '</div>';
  					echo '</div>';      					

  					$b++;
      			$count++;
	      	} ?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($cidade['Lei'])) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Leis</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12">
					<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th width="15%" nowrap><?php echo 'Nome' ?></th>
								<th width="20%" nowrap><?php echo 'Referência' ?></th>
								<th width="50%" nowrap><?php echo 'Descrição' ?></th>
								<th width="15%" nowrap><?php echo 'Site' ?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($cidade['Lei'] as $r) { ?>
							<tr>
								<td nowrap><?php echo h($r['nome']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['referencia']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['descricao']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['site']); ?>&nbsp;</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($elei_mun)) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Resultados de Eleições Municipais</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12 text-justify" style="margin-bottom: 50px">
					<?php
						foreach ($elei_mun as $e) {
							echo '<div class="col-md-2" style="margin-bottom:10px">';
								echo $this->Html->link($e['Eleicao']['ano'], '../files/'.$e['Eleicao']['excel'], array('target' => '_blank', 'class' => 'linkNormal blue'));
							echo '</div>';
						}
	      	?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($elei_nac)) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Resultados de Eleições Nacionais</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12 text-justify" style="margin-bottom: 50px">
					<?php
						foreach ($elei_nac as $e) {
							echo '<div class="col-md-2" style="margin-bottom:10px">';
								echo $this->Html->link($e['Eleicao']['ano'], '../files/'.$e['Eleicao']['excel'], array('target' => '_blank', 'class' => 'linkNormal blue'));
							echo '</div>';
						}
	      	?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 