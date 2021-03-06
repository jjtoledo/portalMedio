<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<?php 
		if (!empty($atrativos)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#fff">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Atrativos Turísticos&nbsp;&nbsp;<span class="glyphicon glyphicon-picture bigger"></span>', array('action' => 'site_atrativos', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_atrativos', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>      
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($atrativos) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php
				    				if ($atrativos[$count]['FotoAtrativo'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($atrativos[$count]['FotoAtrativo']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$atrativos[$count]['FotoAtrativo']['0']['foto'],
												 array('escapeTitle' => false, 'title' => $atrativos[$count]['AtrativoTuristico']['nome'].' - '.$atrativos[$count]['AtrativoTuristico']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor margin">'.$atrativos[$count]['AtrativoTuristico']['nome'].'</h3>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
												 $this->Html->image('turismo.png', array('width' => '45%', 'height' => '60%')),
												 '../img/'.'turismo.png',
												 array('escapeTitle' => false, 'title' => $atrativos[$count]['AtrativoTuristico']['nome'].' - '.$atrativos[$count]['AtrativoTuristico']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr style="margin-top: 30px">';
				    					echo '<h3 class="text-center menor margin">'.$atrativos[$count]['AtrativoTuristico']['nome'].'</h3>';
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
		if (!empty($cidade['Patrimonio'])) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Patrimônios Históricos e Culturais&nbsp;&nbsp;<span class="glyphicon glyphicon-globe bigger"></span>', array('action' => 'site_patrimonios', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_patrimonios', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>      
		    	</div>
		    	<div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($cidade['Patrimonio']) == $count) {
		      					break;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				if ($cidade['Patrimonio'][$count]['foto'] != null) {
				    					echo $this->Html->link(
												 $this->Html->image($cidade['Patrimonio'][$count]['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
												 '../img/'.$cidade['Patrimonio'][$count]['foto'],
												 array('escapeTitle' => false, 'title' => $cidade['Patrimonio'][$count]['nome'].' - '.$cidade['Patrimonio'][$count]['ano'].' - '.$cidade['Patrimonio'][$count]['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
											echo '<h3 class="text-center menor">'.$cidade['Patrimonio'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['Patrimonio'][$count]['ano'].'</p>';
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
												 $this->Html->image('cristo-icon.png', array('width' => '45%', 'height' => '60%')),
												 '../img/'.'cristo-icon.png',
												 array('escapeTitle' => false, 'title' => $cidade['Patrimonio'][$count]['nome'].' - '.$cidade['Patrimonio'][$count]['ano'].' - '.$cidade['Patrimonio'][$count]['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
											);
				    					echo '<hr style="margin-top: 30px">';
				    					echo '<h3 class="text-center menor">'.$cidade['Patrimonio'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['Patrimonio'][$count]['ano'].'</p>';
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
		if (!empty($eventos)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#fff">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Agenda&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar bigger"></span>', array('action' => 'site_agenda', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_agenda', $id), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>      
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
												 array('escapeTitle' => false, 'title' => $eventos[$count]['Evento']['titulo'].' - '.$eventos[$count]['Evento']['data'].' - '.$eventos[$count]['Evento']['horario'].' - '.$eventos[$count]['Evento']['local'].' - '.$cidade['Evento'][$count]['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
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
			    </div>    	
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
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 