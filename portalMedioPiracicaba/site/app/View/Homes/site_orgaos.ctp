<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">
	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
			<?php if (!empty($cidade['OrgaoPublico'])) { ?>
				<div class="container noticias responsive-large">
					<div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Órgãos Públicos&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_orgaos_publicos', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?> 
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_orgaos_publicos', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>     
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($cidade['OrgaoPublico']) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($cidade['OrgaoPublico'][$count]['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($cidade['OrgaoPublico'][$count]['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$cidade['OrgaoPublico'][$count]['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $cidade['OrgaoPublico'][$count]['nome'].' - '.$cidade['OrgaoPublico'][$count]['localizacao'].' - '.$cidade['OrgaoPublico'][$count]['telefone1'].' - '.$cidade['OrgaoPublico'][$count]['telefone2'].' - '.$cidade['OrgaoPublico'][$count]['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$cidade['OrgaoPublico'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['OrgaoPublico'][$count]['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $cidade['OrgaoPublico'][$count]['nome'].' - '.$cidade['OrgaoPublico'][$count]['localizacao'].' - '.$cidade['OrgaoPublico'][$count]['telefone1'].' - '.$cidade['OrgaoPublico'][$count]['telefone2'].' - '.$cidade['OrgaoPublico'][$count]['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$cidade['OrgaoPublico'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['OrgaoPublico'][$count]['telefone1'].'</p>';
				    					echo '</div>';
				    				}
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>						
			    </div>  
			  </div>
			<?php } ?>
	  </div>
	</main>

	<?php 
		if (!empty($cidade['EspacoEvento'])) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Espaços para Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($cidade['EspacoEvento']) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($cidade['EspacoEvento'][$count]['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($cidade['EspacoEvento'][$count]['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$cidade['EspacoEvento'][$count]['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $cidade['EspacoEvento'][$count]['nome'].' - '.$cidade['EspacoEvento'][$count]['descricao'].' - '.$cidade['EspacoEvento'][$count]['localizacao'].' - '.$cidade['EspacoEvento'][$count]['telefone1'].' - '.$cidade['EspacoEvento'][$count]['telefone2'].' - '.$cidade['EspacoEvento'][$count]['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$cidade['EspacoEvento'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['EspacoEvento'][$count]['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $cidade['EspacoEvento'][$count]['nome'].' - '.$cidade['EspacoEvento'][$count]['descricao'].' - '.$cidade['EspacoEvento'][$count]['localizacao'].' - '.$cidade['EspacoEvento'][$count]['telefone1'].' - '.$cidade['EspacoEvento'][$count]['telefone2'].' - '.$cidade['EspacoEvento'][$count]['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$cidade['EspacoEvento'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['EspacoEvento'][$count]['telefone1'].'</p>';
				    					echo '</div>';
				    				}
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>						
			    </div>    				    
		    </div>
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 