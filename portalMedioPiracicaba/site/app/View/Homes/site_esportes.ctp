<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>
<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<?php if (!empty($clube_esportivo)) { ?>
		<main style="background-color: #e6e6e6">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Clubes Esportivos de '.$cidade['Cidade']['nome'].'</h1><br><hr style="margin-top:0; margin-bottom: 10px">' ?>			
				</div>
				<div class="col-md-12 text-justify">
					<?php $count = 0; $b = 0;
      			for ($i=0; $i < count($clube_esportivo); $i++) { 		      				
      				
	      			echo '<div class="row">';   			
	      				echo '<div class="col-md-12" style="margin-bottom: 50px">';
	      				if ($clube_esportivo[$count]['EspacoEvento']['foto_anuncio'] != null) {
	      					echo '<div class="col-md-4">'.$this->Html->link(
										 $this->Html->image($clube_esportivo[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$clube_esportivo[$count]['EspacoEvento']['foto_anuncio'],
										 array('escapeTitle' => false, 'title' => $clube_esportivo[$count]['EspacoEvento']['nome'] . ' - ' . $clube_esportivo[$count]['EspacoEvento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';	      					
	      				} else {
	      					echo '<div class="col-md-4 text-center">'.$this->Html->link(
										 $this->Html->image('espaco_evento.png', array('width' => '80%', 'height' => '100%')),
										 '../img/'.'espaco_evento.png',
										 array('escapeTitle' => false, 'title' => $clube_esportivo[$count]['EspacoEvento']['nome'] . ' - ' . $clube_esportivo[$count]['EspacoEvento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';
	      				}
		      				echo '<div class="col-md-8"><b>'
		    						.$clube_esportivo[$count]['EspacoEvento']['nome'].'</b><br><br>';
		    						if ($clube_esportivo[$count]['EspacoEvento']['telefone1'] != '') {
		    							echo 'Telefone principal: '.$clube_esportivo[$count]['EspacoEvento']['telefone1'].'<br>';
		    						}
		    						if ($clube_esportivo[$count]['EspacoEvento']['telefone2'] != '') {
		    							echo 'Telefone: '.$clube_esportivo[$count]['EspacoEvento']['telefone2'].'<br>';
		    						}
		    						if ($clube_esportivo[$count]['EspacoEvento']['site'] != '') {
		    							echo 'Site: '.$clube_esportivo[$count]['EspacoEvento']['site'].'<br>';
		    						}
		    						if ($clube_esportivo[$count]['EspacoEvento']['localizacao'] != '') {
		    							echo 'Endereço: '.$clube_esportivo[$count]['EspacoEvento']['localizacao'].'<br>';
		    						}
		    						if ($clube_esportivo[$count]['EspacoEvento']['descricao'] != '') {
		    							echo 'Descrição: '.$clube_esportivo[$count]['EspacoEvento']['descricao'].'<br>';
		    						}
		    					echo '</div>';
	      				echo '</div>';
	      			echo '</div>';
	      		?>
				    	
			    	<?php $count++; $b++; if($count == 20) { break; } } ?>	
				</div>
			</div>
		</main>
	<?php } ?>

	<?php if (!empty($clube_recreativo)) { ?>
		<main style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Clubes Recreativos</h1><br><hr style="margin-top:0; margin-bottom: 10px">' ?>			
				</div>

				<div class="col-md-12 text-justify">
					<?php $count = 0; $b = 0;
	      			for ($i=0; $i < count($clube_recreativo); $i++) { 		      				
	      				
      				echo '<div class="row">';
	      				echo '<div class="col-md-12" style="margin-bottom: 50px">';
	      				if ($clube_recreativo[$count]['EspacoEvento']['foto_anuncio'] != null) {
	      					echo '<div class="col-md-4">'.$this->Html->link(
										 $this->Html->image($clube_recreativo[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$clube_recreativo[$count]['EspacoEvento']['foto_anuncio'],
										 array('escapeTitle' => false, 'title' => $clube_recreativo[$count]['EspacoEvento']['nome'] . ' - ' . $clube_recreativo[$count]['EspacoEvento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';	      					
	      				} else {
	      					echo '<div class="col-md-4 text-center">'.$this->Html->link(
										 $this->Html->image('espaco_evento.png', array('width' => '80%', 'height' => '100%')),
										 '../img/'.'espaco_evento.png',
										 array('escapeTitle' => false, 'title' => $clube_recreativo[$count]['EspacoEvento']['nome'] . ' - ' . $clube_recreativo[$count]['EspacoEvento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';
	      				}
		      				echo '<div class="col-md-8"><b>'
		    						.$clube_recreativo[$count]['EspacoEvento']['nome'].'</b><br><br>';
		    						if ($clube_recreativo[$count]['EspacoEvento']['telefone1'] != '') {
		    							echo 'Telefone principal: '.$clube_recreativo[$count]['EspacoEvento']['telefone1'].'<br>';
		    						}
		    						if ($clube_recreativo[$count]['EspacoEvento']['telefone2'] != '') {
		    							echo 'Telefone: '.$clube_recreativo[$count]['EspacoEvento']['telefone2'].'<br>';
		    						}
		    						if ($clube_recreativo[$count]['EspacoEvento']['site'] != '') {
		    							echo 'Site: '.$clube_recreativo[$count]['EspacoEvento']['site'].'<br>';
		    						}
		    						if ($clube_recreativo[$count]['EspacoEvento']['localizacao'] != '') {
		    							echo 'Endereço: '.$clube_recreativo[$count]['EspacoEvento']['localizacao'].'<br>';
		    						}
		    						if ($clube_recreativo[$count]['EspacoEvento']['descricao'] != '') {
		    							echo 'Descrição: '.$clube_recreativo[$count]['EspacoEvento']['descricao'].'<br>';
		    						}
		    					echo '</div>';
	      				echo '</div>';
	      			echo '</div>';
	      		?>
				    	
			    	<?php $count++; $b++; if($count == 20) { break; } } echo '</div>'; ?>	
				</div>
			</div>
		</main>
	<?php } ?>

	<?php if(!empty($eventos)): ?>
	  <section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
	    <div class="container noticias responsive-large">
	      <div class="container-fluid text-center">
	    		<?php echo $this->Html->link('Eventos Esportivos&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar bigger"></span>', array('action' => 'site_agenda', $cidade['Cidade']['id'], 3), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>   
	    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_agenda', $cidade['Cidade']['id'], 3), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>   
	    	</div>
	      <div class="row border">
	      	<?php $count = 0; 
	      			for ($i=0; $i < 4; $i++) { 
	      				if (count($eventos) == $count) {
	      					break;
	      				}
	      		?>
			    	<div class="col-md-3 col-sm-6 divNoticia">
			    		<div class="noticia agenda">
			    			<?php 
			    				if ($eventos[$count]['Evento']['foto_anuncio'] != null) {
			    					echo $this->Html->link(
											 $this->Html->image($eventos[$count]['Evento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
											 '../img/'.$eventos[$count]['Evento']['foto_anuncio'],
											 array('escapeTitle' => false, 'title' => $eventos[$count]['Evento']['titulo'].' - '.$eventos[$count]['Evento']['data'].' - '.$eventos[$count]['Evento']['horario'].' - '.$eventos[$count]['Evento']['local'].' - '.$eventos[$count]['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
										);
										echo '<h3 class="text-center menor">'.$eventos[$count]['Evento']['titulo'].'</h3>';
			    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos[$count]['Evento']['data']. ' - ' .$eventos[$count]['Evento']['horario'].'</p>';
			    				} else if ($eventos[$count]['FotoEvento'] != null) {
			    					echo $this->Html->link(
											 $this->Html->image($eventos[$count]['FotoEvento']['0']['foto'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
											 '../img/'.$eventos[$count]['FotoEvento']['0']['foto'],
											 array('escapeTitle' => false, 'title' => $eventos[$count]['Evento']['titulo'].' - '.$eventos[$count]['Evento']['data'].' - '.$eventos[$count]['Evento']['horario'].' - '.$eventos[$count]['Evento']['local'].' - '.$eventos[$count]['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
										);
										echo '<h3 class="text-center menor">'.$eventos[$count]['Evento']['titulo'].'</h3>';
			    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos[$count]['Evento']['data']. ' - ' .$eventos[$count]['Evento']['horario'].'</p>';
			    				} else {
			    					echo '<div class="config-padding col-md-12 text-center">';
			    					echo $this->Html->link(
											 $this->Html->image('evento.png', array('class' => 'class_img hiding_event', 'width' => '40%', 'height' => '50%')),
											 '../img/'.'evento.png',
											 array('escapeTitle' => false, 'title' => $eventos[$count]['Evento']['titulo'].' - '.$eventos[$count]['Evento']['data'].' - '.$eventos[$count]['Evento']['horario'].' - '.$eventos[$count]['Evento']['local'].' - '.$eventos[$count]['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
										);
			    					echo '<hr class="config-margin-hr">';
			    					echo '<h3 class="text-center menor">'.$eventos[$count]['Evento']['titulo'].'</h3>';
			    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos[$count]['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
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