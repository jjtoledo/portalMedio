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
		if (!empty($espacos)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Espaços para Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 1), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 1), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($espacos) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($espacos[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($espacos[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$espacos[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $espacos[$count]['EspacoEvento']['nome'].' - '.$espacos[$count]['EspacoEvento']['descricao'].' - '.$espacos[$count]['EspacoEvento']['localizacao'].' - '.$espacos[$count]['EspacoEvento']['telefone1'].' - '.$espacos[$count]['EspacoEvento']['telefone2'].' - '.$espacos[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$espacos[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$espacos[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $espacos[$count]['EspacoEvento']['nome'].' - '.$espacos[$count]['EspacoEvento']['descricao'].' - '.$espacos[$count]['EspacoEvento']['localizacao'].' - '.$espacos[$count]['EspacoEvento']['telefone1'].' - '.$espacos[$count]['EspacoEvento']['telefone2'].' - '.$espacos[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$espacos[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$espacos[$count]['EspacoEvento']['telefone1'].'</p>';
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

	<?php 
		if (!empty($hoteis)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#fff">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Hotéis&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 2), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 2), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($hoteis) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($hoteis[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($hoteis[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$hoteis[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $hoteis[$count]['EspacoEvento']['nome'].' - '.$hoteis[$count]['EspacoEvento']['descricao'].' - '.$hoteis[$count]['EspacoEvento']['localizacao'].' - '.$hoteis[$count]['EspacoEvento']['telefone1'].' - '.$hoteis[$count]['EspacoEvento']['telefone2'].' - '.$hoteis[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$hoteis[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$hoteis[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $hoteis[$count]['EspacoEvento']['nome'].' - '.$hoteis[$count]['EspacoEvento']['descricao'].' - '.$hoteis[$count]['EspacoEvento']['localizacao'].' - '.$hoteis[$count]['EspacoEvento']['telefone1'].' - '.$hoteis[$count]['EspacoEvento']['telefone2'].' - '.$hoteis[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$hoteis[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$hoteis[$count]['EspacoEvento']['telefone1'].'</p>';
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

	<?php 
		if (!empty($restaurantes)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Restaurantes&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 3), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 3), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($restaurantes) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($restaurantes[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($restaurantes[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$restaurantes[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $restaurantes[$count]['EspacoEvento']['nome'].' - '.$restaurantes[$count]['EspacoEvento']['descricao'].' - '.$restaurantes[$count]['EspacoEvento']['localizacao'].' - '.$restaurantes[$count]['EspacoEvento']['telefone1'].' - '.$restaurantes[$count]['EspacoEvento']['telefone2'].' - '.$restaurantes[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$restaurantes[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$restaurantes[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $restaurantes[$count]['EspacoEvento']['nome'].' - '.$restaurantes[$count]['EspacoEvento']['descricao'].' - '.$restaurantes[$count]['EspacoEvento']['localizacao'].' - '.$restaurantes[$count]['EspacoEvento']['telefone1'].' - '.$restaurantes[$count]['EspacoEvento']['telefone2'].' - '.$restaurantes[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$restaurantes[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$restaurantes[$count]['EspacoEvento']['telefone1'].'</p>';
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

	<?php 
		if (!empty($bancos)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Bancos&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 4), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 4), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($bancos) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($bancos[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($bancos[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$bancos[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $bancos[$count]['EspacoEvento']['nome'].' - '.$bancos[$count]['EspacoEvento']['descricao'].' - '.$bancos[$count]['EspacoEvento']['localizacao'].' - '.$bancos[$count]['EspacoEvento']['telefone1'].' - '.$bancos[$count]['EspacoEvento']['telefone2'].' - '.$bancos[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$bancos[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$bancos[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $bancos[$count]['EspacoEvento']['nome'].' - '.$bancos[$count]['EspacoEvento']['descricao'].' - '.$bancos[$count]['EspacoEvento']['localizacao'].' - '.$bancos[$count]['EspacoEvento']['telefone1'].' - '.$bancos[$count]['EspacoEvento']['telefone2'].' - '.$bancos[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$bancos[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$bancos[$count]['EspacoEvento']['telefone1'].'</p>';
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

	<?php 
		if (!empty($sitios)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Sítios para alugar&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 5), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 5), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($sitios) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($sitios[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($sitios[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$sitios[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $sitios[$count]['EspacoEvento']['nome'].' - '.$sitios[$count]['EspacoEvento']['descricao'].' - '.$sitios[$count]['EspacoEvento']['localizacao'].' - '.$sitios[$count]['EspacoEvento']['telefone1'].' - '.$sitios[$count]['EspacoEvento']['telefone2'].' - '.$sitios[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$sitios[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$sitios[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $sitios[$count]['EspacoEvento']['nome'].' - '.$sitios[$count]['EspacoEvento']['descricao'].' - '.$sitios[$count]['EspacoEvento']['localizacao'].' - '.$sitios[$count]['EspacoEvento']['telefone1'].' - '.$sitios[$count]['EspacoEvento']['telefone2'].' - '.$sitios[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$sitios[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$sitios[$count]['EspacoEvento']['telefone1'].'</p>';
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

	<?php 
		if (!empty($farmacias)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Farmácias&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id, 6), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_espacos_eventos', $id, 6), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?> 
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($farmacias) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($farmacias[$count]['EspacoEvento']['foto_anuncio'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($farmacias[$count]['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$farmacias[$count]['EspacoEvento']['foto_anuncio'],
												 array('escapeTitle' => false, 'title' => $farmacias[$count]['EspacoEvento']['nome'].' - '.$farmacias[$count]['EspacoEvento']['descricao'].' - '.$farmacias[$count]['EspacoEvento']['localizacao'].' - '.$farmacias[$count]['EspacoEvento']['telefone1'].' - '.$farmacias[$count]['EspacoEvento']['telefone2'].' - '.$farmacias[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$farmacias[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$farmacias[$count]['EspacoEvento']['telefone1'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->link(
												 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
												 '../img/'.'espaco_evento.png',
												 array('escapeTitle' => false, 'title' => $farmacias[$count]['EspacoEvento']['nome'].' - '.$farmacias[$count]['EspacoEvento']['descricao'].' - '.$farmacias[$count]['EspacoEvento']['localizacao'].' - '.$farmacias[$count]['EspacoEvento']['telefone1'].' - '.$farmacias[$count]['EspacoEvento']['telefone2'].' - '.$farmacias[$count]['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr class="config-margin-hr">';
				    					echo '<h3 class="text-center menor">'.$farmacias[$count]['EspacoEvento']['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$farmacias[$count]['EspacoEvento']['telefone1'].'</p>';
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