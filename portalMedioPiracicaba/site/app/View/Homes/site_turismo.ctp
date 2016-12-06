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
	    		echo 		'<h1 class="welcome">Conheça locais de lazer e turismo em '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça locais de lazer e turismo em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça locais de lazer e turismo em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça locais de lazer e turismo em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça locais de lazer e turismo em '.$cidade['Cidade']['nome'].'</h1>'; ?>
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
	  </div>
	</main>

	<?php 
		if (!empty($atrativos)) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#fff">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Atrativos Turísticos&nbsp;&nbsp;<span class="glyphicon glyphicon-picture bigger"></span>', array('action' => 'site_atrativos', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($atrativos) == $count) {
		      					$count = 0;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				echo '<a class="noticia_foto" href="#'./*$eventos[$count]['Evento']['link'].*/'" escape="false">';
				    				if ($atrativos[$count]['FotoAtrativo'] != null) {
					    				echo $this->Html->image($atrativos[$count]['FotoAtrativo']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->image('turismo.png', array('width' => '45%', 'height' => '60%'));
				    					echo '<hr style="margin-top: 30px">';
				    					echo '</div>';
				    				}
				    					echo '<h3 class="text-center menor margin">'.$atrativos[$count]['AtrativoTuristico']['nome'].'</h3>';
				    				echo '</a>';
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
		    	</div>
		    	<div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($cidade['Patrimonio']) == $count) {
		      					$count = 0;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				echo '<a class="noticia_foto" href="#'./*$cidade['Patrimonio'][$count]['link'].*/'" escape="false">';
				    				if ($cidade['Patrimonio'][$count]['foto'] != null) {
					    				echo $this->Html->image($cidade['Patrimonio'][$count]['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->image('cristo-icon.png', array('width' => '48%', 'height' => '50%'));
				    					echo '<hr class="config-margin-hr">';
				    					echo '</div>';
				    				}
				    					echo '<h3 class="text-center menor">'.$cidade['Patrimonio'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['Patrimonio'][$count]['ano'].'</p>';
				    				echo '</a>';
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
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($eventos) == $count) {
		      					$count = 0;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				echo '<a class="noticia_foto" href="#'./*$eventos[$count]['Evento']['link'].*/'" escape="false">';
				    				if ($eventos[$count]['Evento']['foto_anuncio'] != null) {
					    				echo $this->Html->image($eventos[$count]['Evento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->image('evento.png', array('width' => '40%', 'height' => '50%'));
				    					echo '<hr class="config-margin-hr">';
				    					echo '</div>';
				    				}
				    					echo '<h3 class="text-center menor">'.$eventos[$count]['Evento']['titulo'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos[$count]['Evento']['data']. ' - ' .$eventos[$count]['Evento']['horario'].'</p>';
				    				echo '</a>';
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>						
			    </div>    	
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
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 