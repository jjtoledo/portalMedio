<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos_atuais)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos_atuais as $foto) {
  				if ($count == 0) {
  					$active = 'active';
  				} else {
  					$active = '';
  				}

  				echo '<div class="item '.$active.'">';
  				echo 	$this->Html->image($foto['Foto']['foto'], array('width' => '2000'));
	      	echo 	'<div class="carousel-caption">';
	    		echo 		'<h1 class="welcome">Poder Legislativo de '.$cidade['Cidade']['nome'].'</h1>';
	    		echo 		'<div class="arrow bounce"></div>';
	    		echo 	'</div>';
	    		echo '</div>';

	    		$count++;
		  	}
  		} else {
  		?>
	    <div class="item active">
	      <?php echo $this->Html->image('img2.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Legislativo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Legislativo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Legislativo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Legislativo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-10 cresce" style="margin-left: 8.7%">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
	  	<?php if (!empty($camara)) { ?>	  	
		  	<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">'.$camara['Camara']['nome'].'</h1>'?>			
					<hr>
				</div>

				<div class="col-md-12 text-justify">
					<?php
						if (!empty($camara['FotoCamara'])) {
							echo '<div class="col-md-3 noticia_foto">';
							echo $this->Html->image(end($camara['FotoCamara'])['foto'], array('width' => '100%')); 
						  echo '</div>';
						}
					  echo '<div class="noticiaCorpo">';
							echo '<p><b>Endereço: </b>' . $camara['Camara']['endereco'] . '&nbsp;&nbsp;&nbsp;<b>Telefone:</b> ' .$camara['Camara']['telefone1'] .'</p>';
							echo $camara['Camara']['descricao'];
						echo '</div>';

						if (!empty($camara['Denominacao'])) {
							echo '<br><p><b>Denominações anteriores: </b>';
							for ($i=0; $i < count($camara['Denominacao']); $i++) { 
								if ($i == count($camara['Denominacao'])-1) {
									echo $camara['Denominacao'][$i]['denominacao'] . '.';
								} else {
									echo $camara['Denominacao'][$i]['denominacao'] . ', ';
								}
							}
						}
					?>
				</div>			
			<?php } ?>
	  </div>
	</main>

	<?php if (!empty($vereadores)) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Mesa Diretora</h1><br><hr style="margin-top:0">' ?>			
						</div>

						<div class="col-md-12">
							<?php foreach ($vereadores as $p) {
								if ($p['Politico']['mesa_diretora'] != 0) {
			    				echo '<div class="col-md-6" style="margin-top: 20px">';
			    					if (!empty($p['FotoPolitico'])) {
			    						echo '<div class="col-md-12">'.$this->Html->image(end($p['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
			    					} else {
			      					echo '<div class="col-md-12">'.$this->Html->image('politico-icon.png', array('width' => '72%', 'height' => '100%')).'</div>';
			      				}
			      				
			      				if ($p['Politico']['presidente'] != 0) {
			      					echo '<div class="col-md-12"><br><b>'
			    						.$p['Politico']['nome'].' - Presidente</b><br><br>';	
			      				} else {
			      				echo '<div class="col-md-12"><br><b>'
			    						.$p['Politico']['nome'].'</b><br><br>';
			    					}
			    						if (!empty($p['Mandato'])) {
			    							echo '<b>Mandatos:</b><br>';
			    							foreach ($p['Mandato'] as $mandato) {
			    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
			    							}
			    							echo '<br>';
			    						} 
											
											/*$comissao = array();
											foreach ($comissaos as $c) {
												if ($c['Comissao']['id'] == $p['Politico']['comissao_id'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id1'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id2'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id3']) {
													array_push($comissao, $c['Comissao']['nome']);
												}
											}
											for ($i=0; $i < count($comissao); $i++) { 
												if ($i == 0) {
													echo '<b>Participa das Comissões:</b><br>'.$comissao[$i].'<br>';
												} else {
													echo $comissao[$i].'<br>';
												}
											}*/

			    					echo '</div>';
			  					echo '</div>'; 
			  				}
			      	} ?>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Composição Restante</h1><br><hr style="margin-top:0">' ?>							
						</div>

						<div class="col-md-12">
							<?php foreach ($vereadores as $p) {
								if ($p['Politico']['mesa_diretora'] != 1) {
			    				echo '<div class="col-md-6" style="margin-top: 20px">';
			    					if (!empty($p['FotoPolitico'])) {
			    						echo '<div class="col-md-12">'.$this->Html->image(end($p['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
			    					} else {
			      					echo '<div class="col-md-12">'.$this->Html->image('politico-icon.png', array('width' => '72%', 'height' => '100%')).'</div>';
			      				}
			      				echo '<div class="col-md-12"><br><b>'
			    						.$p['Politico']['nome'].'</b><br><br>';
			    						if (!empty($p['Mandato'])) {
			    							echo '<b>Mandatos:</b><br>';
			    							foreach ($p['Mandato'] as $mandato) {
			    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
			    							}
			    							echo '<br>';
			    						} 

			    						/*$comissao = array();
											foreach ($comissaos as $c) {
												if ($c['Comissao']['id'] == $p['Politico']['comissao_id'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id1'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id2'] ||
														$c['Comissao']['id'] == $p['Politico']['comissao_id3']) {
													array_push($comissao, $c['Comissao']['nome']);
												}
											}
											for ($i=0; $i < count($comissao); $i++) { 
												if ($i == 0) {
													echo '<b>Participa das Comissões:</b><br>'.$comissao[$i].'<br>';
												} else {
													echo $comissao[$i].'<br>';
												}
											}*/

			    					echo '</div>';
			  					echo '</div>'; 
			  				}
			      	} ?>	
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($comissaos)) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Comissões Permantes</h1><br><hr style="margin-top:0">' ?>			
						</div>

						<div class="col-md-8 col-md-offset-2">
							<?php foreach ($comissaos as $p) {
								echo '<div class="col-md-12" style="margin-top:15px"><b>'.$p['Comissao']['nome'].'</b>';
									echo '<p>'.$p['Comissao']['descricao'].'</p>';
								echo '</div>';
			      	} ?>	
						</div>
					</div>					
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($presidentes)) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Presidentes da Câmara ao longo dos anos</h1><br><hr style="margin-top:0">' ?>			
						</div>

						<div class="col-md-12">
							<?php foreach ($presidentes as $p) { 
								echo '<div class="col-md-2" style="margin-top:15px">';
									echo $this->Html->image($p['PresidenteCamara']['foto'], array('width' => '100%', 'height' => '100%'));
									echo '<p>'.$p['PresidenteCamara']['descricao'].'</p>';
								echo '</div>';
			      	} ?>	
						</div>
					</div>					
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($cidade['Exvereador'])) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Vereadores ao longo dos anos</h1><br><hr style="margin-top:0">' ?>			
						</div>

						<div class="col-md-12">
							<?php $t=intval(count($cidade['Exvereador'])); 
								if ($t <= 3) {
									foreach ($cidade['Exvereador'] as $p) { 
										echo '<div class="col-md-4">';
											echo '<div class="col-md-12" style="margin-top:15px">';
												echo '<p><b>'.$p['ano_inicio'].' - '.$p['ano_fim'].'</b></p>';
												echo '<p>'.$p['nomes'].'</p>';
											echo '</div>';
										echo '</div>';
									}
								} else { ?>
									<div class="col-md-4">
									<?php $i=0; foreach ($cidade['Exvereador'] as $p) { 
										if ($i < intval($t/3)+1) {
											echo '<div class="col-md-12" style="margin-top:15px">';
												echo '<p><b>'.$p['ano_inicio'].' - '.$p['ano_fim'].'</b></p>';
												echo '<p>'.$p['nomes'].'</p>';
											echo '</div>';				
											$i++;								
										}
					      	}

					      	for ($j=$i-1; $j >= 0; $j--) { 
					      		array_shift($cidade['Exvereador']);
					      	}

					      	?>
					      	</div>

					      	<div class="col-md-4">
									<?php $i=0; foreach ($cidade['Exvereador'] as $p) { 
										if ($i < intval($t/3)) {
											echo '<div class="col-md-12" style="margin-top:15px">';
												echo '<p><b>'.$p['ano_inicio'].' - '.$p['ano_fim'].'</b></p>';
												echo '<p>'.$p['nomes'].'</p>';
											echo '</div>';				
											$i++;								
										}
					      	}

					      	for ($j=$i-1; $j >= 0; $j--) { 
					      		array_shift($cidade['Exvereador']);
					      	}
					      	
					      	?>
					      	</div>

					      	<div class="col-md-4">
									<?php $i=0; foreach ($cidade['Exvereador'] as $p) { 
										echo '<div class="col-md-12" style="margin-top:15px">';
											echo '<p><b>'.$p['ano_inicio'].' - '.$p['ano_fim'].'</b></p>';
											echo '<p>'.$p['nomes'].'</p>';
										echo '</div>';				
					      	}					      	
					      	?>
					      	</div>
					    <?php
					      }
				      ?>
					</div>					
				</div>
			</div>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 