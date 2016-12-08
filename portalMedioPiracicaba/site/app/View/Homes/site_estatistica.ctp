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
			<div class="col-md-10 cresce" style="margin-left: 8.7%">
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

					if (!empty($cidade['Estatistica']['vias'])){
						echo '<b>Vias de Acesso: </b><br>'.$cidade['Estatistica']['vias'];
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
									<td nowrap><?php echo h($p['quantidade']); ?>&nbsp;</td>
								</tr>
							<?php 
							} ?>
							</tbody>
						</table>
					<?php
					}
					?>

					<?php if (!empty($cidade['Estatistica']['limitrofes'])){
						echo '<b>Municípios Limítrofes: </b><br>'.$cidade['Estatistica']['limitrofes'];
					} 

					if (!empty($cidade['Estatistica']['centros'])){
						echo '<br><b>Distância dos Principais Centros: </b><br>'.$cidade['Estatistica']['centros'];
					} 					 
					?>
				</div>
			</div>			
	  </div>
	</main>

		<?php if(!empty($cidade['Distrito'])) { ?>
			<section style="background-color: #fff">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 cresce" style="margin-bottom: 50px">
				  	<div class="row">
					  	<p class="linkNormal">Relação de distritos e povoados</p>
				  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
				    	<?php 
				    		$bairro = $cidade['Distrito'];
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

		<?php if (!empty($rios)): ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Principaos Rios&nbsp;&nbsp;<span class="glyphicon glyphicon-tint bigger"></span>', array('action' => 'site_agenda'), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 
		      				if (count($rios) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				echo '<a class="noticia_foto" href="#'./*$rios[$count]['Rio']['link'].*/'" escape="false">';
				    				if ($rios[$count]['FotoRio'] != null) {
				    					echo $this->Html->image($rios[$count]['FotoRio']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->image('rio-icon.gif', array('width' => '50%', 'height' => '50%'));
				    					echo '<hr class="config-margin-hr">';
				    					echo '</div>';
				    				}
				    					echo '<h3 class="text-center menor">'.$rios[$count]['Rio']['nome'].'</h3>';
				    				echo '</a>';
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia">
			    		<div class="noticia prop large">
			    			<?php 
				    				echo '<a href="'.$anuncios_large['0']['Parceiro']['site'].'" target="_blank" escape="false">';
				    				echo $this->Html->image($anuncios_large['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
				    				echo '</a>'
				    			?>	
			    		</div>
			    	</div>	
			    </div>    	
		    </div>
		  </section>
		<?php endif; ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 