<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos_aereas)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos_aereas as $foto) {
  				if ($count == 0) {
  					$active = 'active';
  				} else {
  					$active = '';
  				}

  				echo '<div class="item '.$active.'">';
  				echo 	$this->Html->image($foto['Foto']['foto'], array('width' => '2000'));
	      	echo 	'<div class="carousel-caption">';
	    		echo 		'<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>';
	    		echo 		'<div class="arrow bounce"></div>';
	    		echo 	'</div>';
	    		echo '</div>';

	    		$count++;
		  	}
  		} else if (!empty($fotos_atuais)) {
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
	    		echo 		'<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="row" style="margin-bottom:40px">
		  	<div class="col-md-10 col-md-offset-1">
		  		<?php echo $this->Element('parceiros'); ?> 
		  	</div>
		  	<div class="col-md-10 col-md-offset-1" style="padding: 0">
		  		<hr style="border-top: 1px solid #ddd; margin-top: 40px; margin-bottom: 40px;">
			  	<div class="col-md-5">
			  		<?php
			  		echo $this->Html->link('História&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span>', array('action' => 'site_historia', $id), array('class' => 'linkNormal', 'escape' => false));
			  		echo '<hr class="config-margin-hr">';
			  		if (empty($cidade['Cidade']['descricao'])) {
			  			if (strlen($cidade['Historia']['historia']) > 1000) {
				  			echo substr($cidade['Historia']['historia'], 0, 1000) . '...';
				  		} else {
				  			echo substr($cidade['Historia']['historia'], 0, 1000);
				  		}
			  		} else {
			  			if (strlen($cidade['Cidade']['descricao']) > 1000) {
				  			echo substr($cidade['Cidade']['descricao'], 0, 1000) . '...';
				  		} else {
				  			echo substr($cidade['Cidade']['descricao'], 0, 1000);
				  		}
			  		}			  		
			  		echo $this->Html->link('<br>Leia mais >>>', array('action' => 'site_historia', $id), array('class' => 'linkNormal', 'escape' => false));
			  		?>
			  	</div>
			  	<div class="col-md-4 col-sm-6 divNoticia center">
		    		<div class="noticia agenda top">
		    			<?php 
		    				if (empty($eventos)) {
		    					echo '<div class="config-padding col-md-12 text-center">';
		    					echo $this->Html->image('evento.png', array('width' => '35%', 'height' => '45%'));
		    					echo '<hr class="config-margin-hr">';
		    					echo '</div>';
		    					echo '<h3 class="text-center menor">Oops..</h3>';
		    					echo '<p class="text-center" style="font-size:18px; color: #51A8B1">Ainda não temos eventos</p>';
		    				} else if ($eventos['0']['Evento']['foto_anuncio'] != null) {
		    					echo $this->Html->link(
										 $this->Html->image($eventos['0']['Evento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$eventos['0']['Evento']['foto_anuncio'],
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$cidade['Evento']['0']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
									echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    				} else if ($eventos['0']['FotoEvento'] != null) {
		    					echo $this->Html->link(
										 $this->Html->image($eventos['0']['FotoEvento']['0']['foto'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$eventos['0']['FotoEvento']['0']['foto'],
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$eventos['0']['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
									echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    				} else {
		    					echo '<div class="config-padding col-md-12 text-center">';
		    					echo $this->Html->link(
										 $this->Html->image('evento.png', array('class' => 'class_img hiding_event', 'width' => '40%', 'height' => '50%')),
										 '../img/'.'evento.png',
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$eventos['0']['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
		    					echo '<hr class="config-margin-hr">';
		    					echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    					echo '</div>';
		    				}
		    			?>	
		    		</div><br>
		    		<?php 
		    			if (empty($cidade['Evento'])) {
	    					echo '';
	    				} else {
		    				echo $this->Html->link('Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>', array('action' => 'site_agenda', $id), array('class' => 'linkNormal', 'escape' => false));
		    			}
		    		?>
		    	</div>
		    	<div class="col-md-3 noRight">
		    		<?php
		    		echo ' 
					    <div class="weather-card">
								<h1>'.$results['results']['temp'].'°</h1>';
								if ($results['results']['description'] == 'Tempo limpo') {
									echo '
									<div class="icon sunny">
						  			<div class="sun">
						    			<div class="rays"></div>
						  			</div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Tempo nublado') {
									echo '
									<div class="icon cloudy">
									  <div class="cloud"></div>
									  <div class="cloud"></div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Parcialmente nublado') {
									echo '
									<div class="icon sun-shower">
									  <div class="cloud"></div>
									  <div class="sun">
									    <div class="rays"></div>
									  </div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Alguns chuviscos') {
									echo '
									<div class="icon rainy">
									  <div class="cloud"></div>
									  <div class="rain"></div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Tempestades') {
									echo '
									<div class="icon thunder-storm">
									  <div class="cloud"></div>
									  <div class="lightning">
									    <div class="bolt"></div>
									    <div class="bolt"></div>
									  </div>
									</div><br>';
								} else {
									echo '
									<div class="icon sunny">
						  			<div class="sun">
						    			<div class="rays"></div>
						  			</div>
									</div><br>';
								}
		  					echo '
								<hr style="margin:0"><p>'.$city.'</p>
					    </div>';
		    		?>
		    	</div>
			  </div>
			</div>
		  <div class="col-md-10 col-md-offset-1 cresce">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  </div>
	 </main>

  <section class="subtitle-intro noticias">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Notícias Regionais&nbsp;&nbsp;<span class="glyphicon glyphicon-plus bigger"></span>', array('action' => 'site_noticias', 2), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    	</div>
      <div class="row border">
      	<div class="col-lg-9">
      		<?php $count = 0; 
      			for ($i=0; $i < 6; $i++) { 
      				if (count($noticias_reg) == $count) {
      					$count = 0;
      				}
      		?>	
		    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
		    		<div class="noticia">
		    			<?php 
		    				echo '<a class="noticia_foto" href="../site_noticia/'.$noticias_reg[$count]['Noticia']['id'].'/'.$noticias_reg[$count]['Noticia']['tipo'].'" escape="false">';
		    				echo $this->Html->image($noticias_reg[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_reg[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
      	</div>
      	<div class="col-lg-3">
      		<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 divNoticia p">
		    		<div class="noticia prop">
		    			<?php 
		    				echo '<a href="'.$anuncios_quad['0']['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_quad['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>
		    		</div><br>
		    	</div>	
      	</div>
	    </div>
	  </div>
  </section>

  <section class="subtitle-intro noticias" style="background-color:#fff">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Boas Notícias&nbsp;&nbsp;<span class="glyphicon glyphicon-leaf bigger"></span>', array('action' => 'site_noticias', 3), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    	</div>
      <div class="row border">
	    	<?php $count = 0; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($noticias_boas) == $count) {
      					$count = 0;
      				}
      		?>
		    	<div class="col-md-3 col-sm-6 divNoticia">
		    		<div class="noticia agenda boas">
		    			<?php 
		    				echo '<a class="noticia_foto" href="../site_noticia/'.$noticias_boas[$count]['Noticia']['id'].'/'.$noticias_boas[$count]['Noticia']['tipo'].'" escape="false">';
		    				echo $this->Html->image($noticias_boas[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_boas[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
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

	<?php echo $this->Element('footer'); ?>
  
</div> 