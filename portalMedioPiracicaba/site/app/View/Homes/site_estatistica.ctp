<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">
	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 cresce">
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

					if (!empty($cidade['Estatistica']['lat'])) {
						echo '<p><b>Latitude: </b>' . $cidade['Estatistica']['lat'] . '°C</p>'; 
					}

					if (!empty($cidade['Estatistica']['lng'])) {
						echo '<p><b>Longitude: </b>' . $cidade['Estatistica']['lng'] . '°C</p>'; 
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
		    		<?php echo $this->Html->link('Principais Rios&nbsp;&nbsp;<span class="glyphicon glyphicon-tint bigger"></span>', array('action' => 'site_rios', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>     
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_rios', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
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
				    				if ($rios[$count]['FotoRio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($rios[$count]['FotoRio']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$rios[$count]['FotoRio']['0']['foto'],
												 array('escapeTitle' => false, 'title' => $rios[$count]['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$rios[$count]['Rio']['nome'].'</h3>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('rio-icon.gif', array('width' => '50%', 'height' => '50%')),
												 '../img/'.'rio-icon.gif',
												 array('escapeTitle' => false, 'title' => $rios[$count]['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$rios[$count]['Rio']['nome'].'</h3>';
				    					echo '</div>';
				    				}
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia">
			    		<div class="noticia prop large">
			    			<?php 
    					$index = mt_rand(0,count($anuncios_large)-1);
	    				echo '<a href="'.$anuncios_large[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
	    				echo $this->Html->image($anuncios_large[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
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