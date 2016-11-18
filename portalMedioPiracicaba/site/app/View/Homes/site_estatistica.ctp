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
	    		echo 		'<h1 class="welcome">Conheça os dados estatísticos de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça os dados estatísticos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça os dados estatísticos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça os dados estatísticos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça os dados estatísticos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 cresce">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
			<div class="col-md-12 text-center">
				<?php echo '<h1 class="noticiasHome">Estatísticas de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>			
			</div>

			<div class="col-md-12 text-justify">
				<div class="col-md-6">
				<?php
					if (!empty($cidade['Estatistica']['area_territorial'])) {
						echo '<p><b>Área Territorial: </b>' . $cidade['Estatistica']['area_territorial'] . 'km²</p>'; 
					}

					if (!empty($cidade['Estatistica']['micro_regiao'])) {
						echo '<p><b>Micro Região: </b>' . $cidade['Estatistica']['micro_regiao'] . '</p>'; 
					}

					if (!empty($cidade['Estatistica']['eleitores'])) {
						echo '<p><b>Eleitores: </b>' . $cidade['Estatistica']['eleitores'] . '</p>'; 
					}

					if (!empty($cidade['Estatistica']['secoes'])) {
						echo '<p><b>Seções Eleitorais: </b>' . $cidade['Estatistica']['secoes'] . '</p>'; 
					}

					if (!empty($cidade['Estatistica']['indice_pluviometrico'])) {
						echo '<p><b>Índice Pluviométrico anual: </b>' . $cidade['Estatistica']['indice_pluviometrico'] . 'mm</p>'; 
					}

					if (!empty($cidade['Estatistica']['altitude_max'])) {
						echo '<p><b>Altitude Máxima: </b>' . $cidade['Estatistica']['altitude_max'] . 'm</p>'; 
					}

					if (!empty($cidade['Estatistica']['altitude_min'])) {
						echo '<p><b>Altitude Mínima: </b>' . $cidade['Estatistica']['altitude_min'] . 'm</p>'; 
					}

					if (!empty($cidade['Estatistica']['altitude_centro'])) {
						echo '<p><b>Altitude Central: </b>' . $cidade['Estatistica']['altitude_centro'] . 'm</p>'; 
					}

					if (!empty($cidade['Estatistica']['relevo_plano'])) {
						echo '<p><b>Relevo Plano: </b>' . $cidade['Estatistica']['relevo_plano'] . '%</p>'; 
					}

					if (!empty($cidade['Estatistica']['relevo_ondulado'])) {
						echo '<p><b>Relevo Ondulado: </b>' . $cidade['Estatistica']['relevo_ondulado'] . '%</p>'; 
					}

					if (!empty($cidade['Estatistica']['relevo_montanhoso'])) {
						echo '<p><b>Relevo Montanhoso: </b>' . $cidade['Estatistica']['relevo_montanhoso'] . '%</p>'; 
					}

					if (!empty($cidade['Estatistica']['clima'])) {
						echo '<p><b>Clima: </b>' . $cidade['Estatistica']['clima'] . '</p>'; 
					}

					if (!empty($cidade['Estatistica']['temp_anual'])) {
						echo '<p><b>Temperatura Anual: </b>' . $cidade['Estatistica']['temp_anual'] . '°C</p>'; 
					}

					if (!empty($cidade['Estatistica']['temp_max'])) {
						echo '<p><b>Temperatura Máxima: </b>' . $cidade['Estatistica']['temp_max'] . '°C</p>'; 
					}

					if (!empty($cidade['Estatistica']['temp_min'])) {
						echo '<p><b>Temperatura Mínima: </b>' . $cidade['Estatistica']['temp_min'] . '°C</p>'; 
					}
				?>
				</div>
				<div class="col-md-6">
					<?php
					if (!empty($cidade['Populacao'])) { ?>
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th nowrap><?php echo 'Ano' ?></th>
									<th nowrap><?php echo 'População Total' ?></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$populacao = $cidade['Populacao'];
							foreach ($populacao as $p) { ?>
								<tr>
									<td nowrap><?php echo h($p['ano']); ?>&nbsp;</td>
									<td nowrap><?php echo h(number_format($p['quantidade'], 0, ',', '.')); ?>&nbsp;</td>
								</tr>
							<?php 
							} ?>
							</tbody>
						</table>
					<?php
					}
					?>
				</div>
			</div>			
	  </div>
	</main>

	<?php 
		if (!empty($cidade['Receita'])) { ?>
			<section style="background-color: #e6e6e6" id="receitas">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Receitas Municipais</h1><br><hr style="margin-top:0">' ?>			
					</div>

					<div class="col-md-12">
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th nowrap><?php echo 'Ano' ?></th>
									<th nowrap><?php echo 'ICMS' ?></th>
									<th nowrap><?php echo 'IPI' ?></th>
									<th nowrap><?php echo 'IPVA' ?></th>
									<th nowrap><?php echo 'IPTU' ?></th>
									<th nowrap><?php echo 'Outras *' ?></th>
									<th nowrap><?php echo 'Total' ?></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$receita = $cidade['Receita'];
							foreach ($receita as $r) { 
								$fpm        = str_replace(",", ".", str_replace(".", "", substr($r['fpm'], 3)));
								$royalties  = str_replace(",", ".", str_replace(".", "", substr($r['royalties'], 3)));
								$itr        = str_replace(",", ".", str_replace(".", "", substr($r['itr'], 3)));
								$cide       = str_replace(",", ".", str_replace(".", "", substr($r['cide'], 3)));
								$fundeb     = str_replace(",", ".", str_replace(".", "", substr($r['fundeb'], 3)));
								$lei_kandir = str_replace(",", ".", str_replace(".", "", substr($r['lei_kandir'], 3)));
								$fex        = str_replace(",", ".", str_replace(".", "", substr($r['fex'], 3)));
								$afm_afe    = str_replace(",", ".", str_replace(".", "", substr($r['afm_afe'], 3)));
								$iss        = str_replace(",", ".", str_replace(".", "", substr($r['iss'], 3)));
								$irrf       = str_replace(",", ".", str_replace(".", "", substr($r['irrf'], 3)));
								
								$outras = $fpm + $royalties + $itr + $cide + $fundeb + $lei_kandir + $fex + $afm_afe + $iss + $irrf; 
								$outras = number_format($outras, 2, ',', '.');

								$outras = 'R$ ' . $outras; 
							?>
								<tr>
									<td nowrap><?php echo h($r['ano']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['icms']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['ipi']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['ipva']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['iptu']); ?>&nbsp;</td>
									<td nowrap><?php echo h($outras); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['total']); ?>&nbsp;</td>
								</tr>
							<?php 
							} ?>
							</tbody>
						</table>
						<b><i style="font-size: 12px">* Outras = FPM, Royalties, ITR, CIDE, Fundeb, Lei Kandir, FEX, AFM/AFE, ISS e IRRF</i></b>
					</div>
			  </div>
			</section>
		<?php } ?>

		<?php if(!empty($cidade['Bairro'])) { ?>
			<section style="background-color: #fff">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 cresce" style="margin-bottom: 50px; margin-top: 50px">
				  	<div class="row">
					  	<p class="linkNormal">Relação de bairros e povoados</p>
				  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
				    	<?php 
				    		$bairro = $cidade['Bairro'];
				    		foreach ($bairro as $b):
				    			echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
				    			echo '<a href="#" class="listMenu">
				    							<span class="glyphicon glyphicon-map-marker"></span> ' . $b['nome'] . '
				    						</a><br>';
				    			echo '</div>';
				    		endforeach;
				    	?>
				    </div> 
				  </div>
				</div>
			</section>
		<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 