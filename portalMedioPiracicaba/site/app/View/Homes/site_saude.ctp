<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
			<?php if (!empty($cidade['OrgaoSaude'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Órgãos de saúde</h1><br>' ?>			
				</div>

				<?php // foreach ($tipos as $t) { ?>
					<div class="col-md-12 text-justify">
		      	<!--<p class="linkNormal" style="margin-top: 20px"><?php echo $t['OrgaoSaude']['tipo'] ?></p>-->
	  				<hr style="border-top: 1px solid #ddd; margin-top: 10px; margin-bottom: 15px; width: auto">	
						<?php $count = 0; $b = 0;
	      			foreach ($cidade['OrgaoSaude'] as $orgao) {
	      				if ($count == 20) {
	      					break;
	      				}

	      				if ($b == 2) {	
		      				$b = 0;	      				
		      				echo '</div>';
		      			}
		      			if ($count % 2 == 0) {	
		      				echo '<div class="row">';
		      			}

	      				//if ($t['OrgaoSaude']['tipo'] == $orgao['tipo']) {	      				
		      				echo '<div class="col-md-6" style="margin-bottom: 50px">';
		      				if ($orgao['foto_anuncio'] != null) {
		      					echo '<div class="col-md-6">'.$this->Html->image($orgao['foto_anuncio'], array('width' => '100%', 'height' => '100%')).'</div>';	      					
		      				} else {
		      					echo '<div class="col-md-6 text-center">'.$this->Html->image('saude.png', array('width' => '80%', 'height' => '100%')).'</div>';
		      				}
			      				echo '<div class="col-md-6"><b>'
			    						.$orgao['nome'].'</b><br><br>';
			    						if ($orgao['telefone1'] != '') {
			    							echo 'Telefone Principal: '.$orgao['telefone1'].'<br>';
			    						}
			    						if ($orgao['telefone2'] != '') {
			    							echo 'Telefone: '.$orgao['telefone2'].'<br>';
			    						}
			    						if ($orgao['site'] != '') {
			    							echo 'Site: '.$orgao['site'].'<br>';
			    						}
			    						if ($orgao['localizacao'] != '') {
			    							echo 'Endereço: '.$orgao['localizacao'].'<br>';
			    						}
			    					echo '</div>';
		      				echo '</div>';

		      				$b++;
		      				$count++;
		      			//}		      			
		      		}
		      		echo '</div>';		      	
		      	?>						
				</div>
			<?php //} 
			} ?>
	  </div>
	</main>

	<?php if (!empty($cidade['Medico'])) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">		  	
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Médicos</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-10 col-md-offset-1">
					<?php foreach ($especialidades as $e) { ?>
						<p class="linkNormal" style="margin-top: 20px"><?php echo $e['Medico']['especialidade'] ?></p>
	  				<hr style="border-top: 1px solid #ddd; margin-top: 10px; margin-bottom: 15px; width: auto">	
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
							<tbody>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Telefone 1</th>
										<th>Telefone 2</th>
										<th>Endereço</th>
									</tr>
								</thead>
							<?php foreach ($cidade['Medico'] as $m) { 
								if ($m['especialidade'] == $e['Medico']['especialidade']) { ?>
									<tr>
										<td width="30%"><?php echo h($m['nome']); ?>&nbsp;</td>
										<td width="15%"><?php echo h($m['telefone1']); ?>&nbsp;</td>
										<td width="15%"><?php echo h($m['telefone2']); ?>&nbsp;</td>
										<td width="40%"><?php echo h($m['endereco']); ?>&nbsp;</td>
									</tr>
								<?php	} ?>									
							<?php	} ?>
							</tbody>
						</table>	
					<?php	} ?>
			  </div>
		  </div>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 